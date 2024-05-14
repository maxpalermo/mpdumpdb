<?php

namespace MpSoft\MpDumpDb\Export;
class TemplateExportController
{
    protected $table_name;
    protected $fields = [];

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

    public function getRows()
    {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . $this->table_name;
        $result = \Db::getInstance()->executeS($sql);

        return $result;
    }
}