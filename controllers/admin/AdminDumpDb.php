<?php
use MpSoft\MpDumpDb\Export\TemplateExportController;

/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    Massimiliano Palermo <maxx.palermo@gmail.com>
 * @copyright Since 2016 Massimiliano Palermo
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class AdminDumpDbController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'configuration';
        $this->className = 'Configuration';
        $this->lang = false;
        $this->deleted = false;
        $this->explicitSelect = true;
        $this->allow_export = true;
        $this->allow_import = true;
        $this->allow_add = false;
        $this->allow_delete = false;
        $this->allow_list = true;
        $this->allow_edit = false;
        $this->allow_view = false;
        $this->allow_show_toolbar = true;
        $this->identifier = 'id_configuration';
        $this->title = 'Dump DB';
        $this->context = Context::getContext();
        $this->show_toolbar = true;
        $this->toolbar_title = 'Dump DB';
        $this->toolbar_btn = [];
        $this->bulk_actions = [
            'export' => [
                'text' => $this->l('Esporta DB'),
                'icon' => 'icon-download',
            ],
        ];

        parent::__construct();
    }

    public function initContent()
    {
        $this->content .= $this->renderForm();
        parent::initContent();
    }

    public function renderForm()
    {
        $smarty = $this->context->smarty;
        $smarty->assign('action', $this->context->link->getAdminLink($this->controller_name));
        $smarty->assign('token', Tools::getAdminTokenLite($this->controller_name));
        $smarty->assign('icon', 'icon-download');
        $smarty->assign('title', $this->l('Esporta DB'));
        $smarty->assign('message', $this->l('Clicca sul pulsante per esportare il database.'));
        $smarty->assign('button', $this->l('Esporta DB'));
        $smarty->assign('button_action', 'export');
        $smarty->assign('button_icon', 'icon-download');
        $smarty->assign('tables_list', $this->getTablesListLight());
        $smarty->assign('db_versions', [
            'v161' => 'Prestashop 1.6.1',
            'v170' => 'Prestashop 1.7.0',
            'v175' => 'Prestashop 1.7.5',
            'v176' => 'Prestashop 1.7.6',
            'v178' => 'Prestashop 1.7.8',
            'v800' => 'Prestashop 8.0.0',
            'v810' => 'Prestashop 8.1.0',
            'v815' => 'Prestashop 8.1.5',
        ]);

        return $this->context->smarty->fetch($this->module->getLocalPath() . 'views/templates/admin/dumpDB.tpl');
    }

    public function getTablesListLight()
    {
        $tables = $this->getTablesList();
        $excluded = TemplateExportController::getExcluded();
        foreach ($tables as $key => $table) {
            $tablename = str_replace(_DB_PREFIX_, '', $table);
            if (in_array($tablename, $excluded)) {
                unset($tables[$key]);
            }
        }

        return $tables;
    }

    public function getTablesList()
    {
        $conn = $this->OpenCon();
        $tables = $conn->query('SHOW TABLES');
        $tables_list = [];
        while ($table = $tables->fetch_array()) {
            $tables_list[] = $table[0];
        }

        return $tables_list;
    }

    function OpenCon()
    {
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '4cc3550';
        $dbName = 'prestashop_16124';
        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName) or die("Connect failed: %s\n" . $conn->error);

        return $conn;
    }

    function CloseCon($conn)
    {
        $conn->close();
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitExport')) {
            $tables = Tools::getValue('tables_list');
            $source_controllers = [];
            $dest_controllers = [];
            $db_version_source = Tools::getValue('db_version_source');
            $db_version_dest = Tools::getValue('db_version_dest');
            $queries = [];
            $table_name = null;
            $file_name = null;

            foreach ($tables as $table) {
                $controller_name = ucfirst(Tools::toCamelCase(str_replace(_DB_PREFIX_, '', $table)));
                $source_controller = 'MpSoft\MpDumpDb\Export\\' . $db_version_source . '\\' . $controller_name;
                $dest_controller = 'MpSoft\MpDumpDb\Export\\' . $db_version_dest . '\\' . $controller_name;
                $source_controllers[] = new $source_controller;
                $dest_controllers[] = new $dest_controller;
            }

            foreach ($source_controllers as $source_controller) {
                if (!$file_name) {
                    $file_name = $source_controller->getTableName();
                }
                $table_name = $source_controller->getTableName();
                $source_fields_orig = $source_controller->getFieldsKey();
                $source_fields_current = $this->getFields($table_name);
                $source_fields = array_intersect($source_fields_orig, $source_fields_current);

                $rows = $source_controller->getRows($source_fields[0]);
                $fields = $source_controller->getFieldsKey();
                $values = [];

                if (!$rows) {
                    continue;
                }

                foreach ($rows as &$row) {
                    foreach ($row as $key => $value) {
                        if (!in_array($key, $source_fields)) {
                            unset($row[$key]);
                        } else {
                            $row[$key] = '\'' . pSQL($value) . '\'';
                        }
                    }
                    $row = array_values($row);
                    $values[] = '(' . implode(', ', $row) . ')';
                }

                $query = 'INSERT IGNORE INTO ' . _DB_PREFIX_ . $table_name . ' (' . implode(', ', $fields) . ') VALUES ' . implode(', ', $values) . ';';
                $queries[] = $query;
            }
            $this->download(implode("\n", $queries), $table_name);

            $this->confirmations[] = 'Tabelle esportate da ' . $db_version_source . ' a ' . $db_version_dest . ': ' . implode(', ', $tables);
        }
    }

    protected function getFields($table)
    {
        $conn = Db::getInstance();
        $fields = $conn->executeS('SHOW COLUMNS FROM ' . _DB_PREFIX_ . $table);
        $fields_list = [];
        foreach ($fields as $field) {
            $fields_list[] = $field['Field'];
        }

        return $fields_list;
    }

    protected function download($content, $table)
    {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $table . '.sql"');
        header('Content-Length: ' . strlen($content));
        header('Connection: close');
        echo $content;

        exit;
    }
}
