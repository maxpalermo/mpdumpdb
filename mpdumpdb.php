<?php
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

require_once _PS_MODULE_DIR_ . 'mpdumpdb/vendor/autoload.php';
require_once _PS_MODULE_DIR_ . 'mpdumpdb/src/Models/autoload.php';

class MpDumpDb extends MpSoft\MpDumpDb\Module\ModuleTemplate
{
    public function __construct()
    {
        $this->name = 'mpdumpdb';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Massimiliano Palermo';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = ['min' => '1.6', 'max' => _PS_VERSION_];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('MP Esporta DB');
        $this->description = $this->l('Esporta il database per le nuove versioni.');
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('actionAdminControllerSetMedia')
            && $this->installMenu(
                'Dump DB',
                $this->name,
                'AdminParentAdvancedParameters',
                'AdminDumpDb'
            );
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->uninstallMenu('AdminDumpDb');
    }

    public function hookActionAdminControllerSetMedia()
    {
        $this->context->controller->addCSS($this->getLocalPath() . 'views/css/icon-menu.css');
    }
}