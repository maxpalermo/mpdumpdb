<?php

namespace MpSoft\MpDumpDb\Export;
class TemplateExportController
{
    protected $table_name;
    protected $fields = [];
    protected static $excluded = [
        'access',
        'accessory',
        'address_format',
        'admin_filter',
        'advice',
        'advice_lang',
        'attribute_impact',
        'authorization_role',
        'condition',
        'condition_advice',
        'configuration',
        'configuration_lang',
        'configuration_kpi',
        'configuration_kpi_lang',
        'country',
        'country_lang',
        'country_shop',
        'currency',
        'currency_shop',
        'ganalytics',
        'ganalytics_data',
        'gender',
        'gender_lang',
        'guest',
        'hook',
        'hook_alias',
        'hook_module',
        'hook_module_exceptions',
        'info',
        'info_lang',
        'info_shop',
        'lang',
        'lang_shop',
        'meta',
        'meta_lang',
        'module',
        'module_access',
        'module_carrier',
        'module_country',
        'module_currency',
        'module_group',
        'module_history',
        'module_preference',
        'module_shop',
        'operating_system',
        'state',
        'tab',
        'tab_advice',
        'tab_lang',
        'tab_module_preference',
        'timezone',
        'web_browser',
        'zone',
        'zone_shop',
    ];

    public static function getExcluded()
    {
        return self::$excluded;
    }

    public function getTableName()
    {
        return $this->table_name;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getFieldsKey()
    {
        return array_keys($this->fields);
    }

    public function getRows($orderBy = '')
    {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . $this->table_name;
        if ($orderBy) {
            $sql .= ' ORDER BY ' . $orderBy . ' ASC';
        }
        $result = \Db::getInstance()->executeS($sql);

        return $result;
    }
}
