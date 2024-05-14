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

namespace MpSoft\MpDumpDb\Module;

if (!defined('_PS_VERSION_')) {
    exit;
}

class ModuleTemplate extends \Module
{
    /**
     * Install a new menu
     *
     * @param string $name Tab name
     * @param string $module_name Module name
     * @param string $parent Parent tab name
     * @param string $controller Controller class name
     * @param string $icon Material Icon name
     * @param string $wording Wording type
     * @param string $wording_domain Wording domain
     * @param bool $active If true, Tab menu will be shown
     * @param bool $enabled If true Tab menu is enabled
     *
     * @return bool True if successful, False otherwise
     */
    public function installMenu(
        string $name,
        string $module_name,
        string $parent,
        string $controller,
        bool $active = true
    ) {
        // Create new admin tab
        $tab = new \Tab();

        if ($parent != -1) {
            $id_parent = \Tab::getIdFromClassName($parent);
            $tab->id_parent = (int) $id_parent;
        } else {
            $tab->id_parent = -1;
        }
        $tab->name = [];

        if (!is_array($name)) {
            foreach (\Language::getLanguages(true) as $lang) {
                $tab->name[$lang['id_lang']] = $name;
            }
        } else {
            foreach ($name as $name_lang) {
                $tab->name[$name_lang['id_lang']] = $name_lang['name'];
            }
        }

        $tab->class_name = $controller;
        $tab->module = $module_name;
        $tab->active = $active;
        $result = $tab->add();

        return $result;
    }

    /**
     * Uninstall a menu
     *
     * @param string|array $className Class name of the controller
     *
     * @return bool True if successful, False otherwise
     */
    public function uninstallMenu($className)
    {
        $result = true;
        if (is_array($className)) {
            foreach ($className as $menu) {
                $result = $result && $this->uninstallTab($menu);
            }
        } else {
            $result = $this->uninstallTab($className);
        }

        return $result;
    }

    private function uninstallTab($className)
    {
        $id_tab = \Tab::getIdFromClassName($className);
        if ($id_tab) {
            $tab = new \Tab((int) $id_tab);

            return $tab->delete();
        }

        return true;
    }

    public static function insertValueAtPosition($arr, $insertedArray, $position)
    {
        $i = 0;
        $new_array = [];
        foreach ($arr as $key => $value) {
            if ($i == $position) {
                foreach ($insertedArray as $i_key => $i_value) {
                    $new_array[$i_key] = $i_value;
                }
            }
            $new_array[$key] = $value;
            ++$i;
        }

        return $new_array;
    }

    public function registerHooks(\Module $module, array $hooks)
    {
        foreach ($hooks as $hook) {
            if (!$module->registerHook($hook)) {
                return false;
            };
        }

        return true;
    }

    public function getIndexOfField($haystack, $needle)
    {
        $idx = 0;
        foreach ($haystack as $key => $field) {
            if ($key == $needle) {
                return ++$idx;
            }
            ++$idx;
        }
    }
}