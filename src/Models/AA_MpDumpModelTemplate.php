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
class AA_MpDumpDbModelTemplate extends ObjectModel
{
    public static function addPrefix($table)
    {
        if (!preg_match('/^' . _DB_PREFIX_ . '/', $table)) {
            $table = _DB_PREFIX_ . $table;
        }

        return $table;
    }

    public static function existsTable($table)
    {
        $db = \Db::getInstance();
        $table = self::addPrefix($table);
        $sql = "SELECT count(*) FROM $table";

        try {
            $rows = $db->getValue($sql);
        } catch (\Throwable $th) {
            return false;
        }

        return $rows > 0;
    }

    public static function existsColumn($table, $column)
    {
        $table = self::addPrefix($table);
        $schema = _DB_NAME_;
        $sql = 'SELECT count(*) '
            . 'FROM information_schema.COLUMNS '
            . 'WHERE '
            . "TABLE_SCHEMA = '{$schema}' "
            . "AND TABLE_NAME = '{$table}' "
            . "AND COLUMN_NAME = '{$column}';";

        return (int) Db::getInstance()->getValue($sql);
    }

    public static function existsIndexByColumn($table, $column)
    {
        $table = self::addPrefix($table);
        $query = "show index from {$table} where Column_name='{$column}';";
        $result = Db::getInstance()->executeS($query);
        if ($result) {
            $index = $result[0]['Key_name'];

            return $index;
        }

        return false;
    }

    public static function addIndex($table, $columns, $name = '', $type = '')
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }
        if (!$name) {
            $name = 'IDX_' . implode('_', $columns);
        }
        $columns = implode(',', $columns);
        $table = self::addPrefix($table);
        $sql = "ALTER TABLE `{$table}` ADD {$type} INDEX `{$name}` (`{$columns}`);";

        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public static function addColumn($table, $name, $type, $null = false)
    {
        $table = self::addPrefix($table);
        $sql = "ALTER TABLE `{$table}` ADD COLUMN `{$name}` {$type}" . ($null ? '' : ' NOT NULL') . ';';

        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public static function alterColumn($table, $name, $type, $null = false)
    {
        $table = self::addPrefix($table);
        $sql = "ALTER TABLE `{$table}` MODIFY COLUMN `{$name}` {$type}" . ($null ? '' : ' NOT NULL') . ';';

        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public static function dropColumn($table, $name)
    {
        $table = self::addPrefix($table);
        $sql = "ALTER TABLE `{$table}` DROP COLUMN `{$name}`;";

        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public static function dropColumns($table, $fields)
    {
        foreach ($fields as $field) {
            try {
                $res = self::dropColumn($table, $field);
            } catch (\Throwable $th) {
                $res = false;
            }
        }

        return $res;
    }

    public static function copyColumn($table, $source, $dest)
    {
        $table = self::addPrefix($table);
        $source = self::addPrefix($source);
        $dest = self::addPrefix($dest);
        $sql = "ALTER TABLE `{$table}` ADD COLUMN `{$dest}` INT NOT NULL DEFAULT 0;";
        $sql .= "UPDATE `{$table}` SET `{$dest}` = `{$source}`;";

        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public static function renameColumn($table, $current_name, $new_name)
    {
        $table = self::addPrefix($table);
        $sql = "ALTER TABLE `{$table}` RENAME COLUMN `{$current_name}` TO `{$new_name}`;";

        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public static function clone($source, $dest)
    {
        $source = self::addPrefix($source);
        $dest = self::addPrefix($dest);
        $clone = "CREATE TABLE {$dest} LIKE {$source};\n"
            . "INSERT INTO {$dest} SELECT * FROM {$source};";

        try {
            return \Db::getInstance()->execute($clone);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public function findTablesByNameColumn($column_name)
    {
        if (!is_array($column_name)) {
            $column_name = [$column_name];
        }
        if (is_array($column_name)) {
            foreach ($column_name as $column) {
                if (!preg_match('/^`.*`$/', $column)) {
                    $column = "`{$column}`";
                }
            }
            $column_name = implode("','", $column_name);
        }
        $sql = 'SELECT DISTINCT table_name, column_name FROM information_schema.columns '
            . "WHERE column_name IN ({$column_name}) AND table_schema = '" . _DB_NAME_ . "'";
        $rows = \Db::getInstance()->executeS($sql);
        if ($rows) {
            return $rows;
        }

        return [];
    }

    public static function truncate()
    {
        return Db::getInstance()->execute('TRUNCATE TABLE ' . _DB_PREFIX_ . static::$definition['table']);
    }

    public static function drop($table)
    {
        $table = self::addPrefix($table);

        return \Db::getInstance()->execute("DROP TABLE `{$table}`");
    }

    public static function createTable()
    {
        $definition = static::$definition;
        $sql = static::createSQL($definition);
        if (isset($definition['multilang']) && $definition['multilang']) {
            $sql .= static::createSQL($definition, true);
        }

        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public static function executeSql($sql)
    {
        try {
            return \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    /**
     * Create Sql Table from Prestashop ObjectModel Definition
     * add 'datetime' to definition field to set as DATETIME,
     * add 'price' to definition field to set as DECIMAL(20,6),
     * add 'enum' to definition field to set as ENUM, the enum must contains all enum values,
     * add 'text' to definition field to set as TEXT, it can depend by 'size' property,
     * add 'fixed' to definition field to set as CHAR, it can depend by 'size' property,
     * add 'default_value' to definition field to set DEFAULT in NULL fields,
     * add 'comment' to definition field to set COMMENT, 'comment' must contains the field comment
     *
     * @return string Sql create table
     */
    public static function createSQL($definition, $lang = false)
    {
        $tableName = _DB_PREFIX_ . $definition['table'];
        $primary = $definition['primary'];

        if ($lang) {
            $fields = [
                "`{$primary}` INT NOT NULL",
                '`id_lang` INT NOT NULL',
            ];
            $tableName .= '_lang';
        } else {
            $fields = [
                "`{$primary}` INT NOT NULL AUTO_INCREMENT",
            ];
        }

        foreach ($definition['fields'] as $key => $field) {
            $langField = isset($field['lang']) && $field['lang'];
            if ($lang && !$langField) {
                continue;
            }
            if (!$lang && $langField) {
                continue;
            }

            switch ($field['type']) {
                case \ObjectModel::TYPE_BOOL:
                    $fields[] = self::generateField($key, $field, 'TINYINT(1)');

                    break;
                case \ObjectModel::TYPE_DATE:
                    if (isset($field['day']) && $field['day']) {
                        $fields[] = self::generateField($key, $field, 'DATE');
                    } else {
                        $fields[] = self::generateField($key, $field, 'DATETIME');
                    }

                    break;
                case \ObjectModel::TYPE_FLOAT:
                    $fields[] = self::generateField($key, $field, 'FLOAT');

                    break;
                case \ObjectModel::TYPE_HTML:
                    $fields[] = self::generateField($key, $field, 'TEXT');

                    break;
                case \ObjectModel::TYPE_INT:
                    $fields[] = self::generateField($key, $field, 'INT(11)');

                    break;
                case \ObjectModel::TYPE_NOTHING:
                    break;
                case \ObjectModel::TYPE_SQL:
                    break;
                case \ObjectModel::TYPE_STRING:
                    $size = (isset($field['size']) && $field['size']) ? (int) $field['size'] : 255;
                    if ($size > 255) {
                        $type = 'TEXT';
                    } else {
                        $type = "VARCHAR({$size})";
                    }
                    $fields[] = self::generateField($key, $field, $type);

                    break;
                default:
            }
        }

        $fields[] = "PRIMARY KEY (`{$primary}`)";

        $sql = "CREATE TABLE IF NOT EXISTS `{$tableName}` (" . implode(',', $fields) . ') ENGINE=InnoDB;';

        return $sql;
    }

    protected static function generateField($key, $field, $type)
    {
        if ($key == 'date_add') {
            $value = '`date_add` DATETIME NOT NULL ';
        } elseif ($key == 'date_upd') {
            $value = '`date_upd` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ';
        } else {
            $value = "`{$key}` {$type} ";
            if (isset($field['required']) && $field['required']) {
                $value .= ' NOT NULL ';
            } else {
                $value .= ' NULL ';
            }
            if (isset($field['default']) && $field['default']) {
                $value .= " DEFAULT '{$field['default']}' ";
            }
        }

        return $value;
    }

    public static function createIndex($table, $fields, $name, $type = 'UNIQUE')
    {
        if (!preg_match('/^' . _DB_PREFIX_, $table)) {
            $table = _DB_PREFIX_ . $table;
        }
        if (is_array($fields)) {
            $fields = implode(',', $fields);
        }

        $sql = "CREATE {$type} INDEX {$name} ON {$table} ({$fields})";
        $res = false;

        try {
            $res = \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        return $res;
    }

    public static function dropIndex($table, $name = '`PRIMARY`')
    {
        if (!preg_match('/^' . _DB_PREFIX_, $table)) {
            $table = _DB_PREFIX_ . $table;
        }
        $sql = "DROP INDEX {$name} ON {$table};";
        $res = false;

        try {
            $res = \Db::getInstance()->execute($sql);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        return $res;
    }

    public static function renameIndex($table, $oldName, $newName)
    {
    }

    public function addSelect(&$select, $field)
    {
        if (!preg_match('/,$/i', $select)) {
            $select .= ',';
        }

        $select .= $field;
    }

    public function addJoin(&$join, $item)
    {
        $item = str_replace('{PFX}', _DB_PREFIX_, $item);
        $join .= ' ' . $item;
    }

    public function addWhere($where, $item)
    {
        $where .= ' AND ' . $item;
    }
}