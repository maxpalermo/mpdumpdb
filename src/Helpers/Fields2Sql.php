<?php

namespace MpSoft\MpDumpDb\Helpers;

class Fields2Sql
{
    protected $table_name;
    protected $fields;
    protected $engine;
    protected $charset;
    protected static $max_values = 5000;

    public function __construct($table_name, $fields)
    {
        $this->table_name = $table_name;
        $this->fields = $fields;
        $this->engine = 'InnoDB';
        $this->charset = 'utf8';
    }

    public function createTable($ifNotExists = true, $prefix = '')
    {
        $sql = 'CREATE TABLE ' . ($ifNotExists ? 'IF NOT EXISTS ' : '') . '`' . $prefix . $this->table_name . '` (';

        foreach ($this->fields as $field) {
            $sql .= '`' . $field['name'] . '` ' . $field['type'];

            if (isset($field['length'])) {
                $sql .= '(' . $field['length'] . ')';
            }

            if (isset($field['precision'])) {
                $sql .= '(' . $field['length'] . ', ' . $field['precision'] . ')';
            }

            if (isset($field['null']) && !$field['null']) {
                $sql .= ' NOT NULL';
            }

            if (isset($field['default'])) {
                $sql .= ' DEFAULT ' . $field['default'];
            }

            if (isset($field['autoincrement']) && $field['autoincrement']) {
                $sql .= ' AUTO_INCREMENT';
            }

            if (isset($field['primary']) && $field['primary']) {
                $sql .= ' PRIMARY KEY';
            }

            if (isset($field['index']) && $field['index']) {
                $sql .= ' INDEX';
            }

            $sql .= ', ';
        }

        $sql = rtrim($sql, ', ');

        $sql .= ') ENGINE=' . $this->getEngine() . ' DEFAULT CHARSET=' . $this->getCharset() . ';';

        return $sql;
    }

    public static function export($prefix, $tablename, $source, $dest_fields)
    {
        $queries = [];
        $dest_fields_name = array_map(function ($field) {
            return '`' . $field['name'] . `'`;
        }, $dest_fields);
        $dest_fields_name = implode(', ', $dest_fields);
        $sql = "INSERT IGNORE INTO `{$prefix}{$tablename}` ({$dest_fields_name}) VALUES __VALUES__;";

        $values = [];
        $idx = 0;
        foreach ($source as $row) {
            foreach ($dest_fields as $field) {
                $values[] = isset($row[$field['name']]) ? "'" . pSQL($row[$field['name']]) . "'" : 'NULL';
            }
            ++$idx;
            if ($idx == self::$max_values) {
                $queries[] = str_replace('__VALUES__', implode(', ', $values), $sql);
                $values = [];
                $idx = 0;
            }
        }

        return $queries;
    }

    public function getEngine()
    {
        return $this->engine;
    }

    public function getCharset()
    {
        return $this->charset;
    }
}