<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Carrier extends TemplateExportController
{
    protected $table_name = 'carrier';
    protected $fields = [
        'id_carrier' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
            'autoincrement' => true,
        ],
        'id_reference' => [
            'type' => DbTypes::TYPE_INT,
            'index' => 'index',
        ],
        'name' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 64,
            'null' => false,
        ],
        'url' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 255,
        ],
        'active' => [
            'type' => DbTypes::TYPE_BOOL,
            'default' => 0,
        ],
        'deleted' => [
            'type' => DbTypes::TYPE_BOOL,
            'default' => 0,
        ],
        'shipping_handling' => [
            'type' => DbTypes::TYPE_BOOL,
            'default' => 0,
        ],
        'range_behavior' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
        'is_module' => [
            'type' => DbTypes::TYPE_BOOL,
            'default' => 0,
        ],
        'is_free' => [
            'type' => DbTypes::TYPE_BOOL,
            'default' => 0,
        ],
        'shipping_external' => [
            'type' => DbTypes::TYPE_BOOL,
            'default' => 0,
        ],
        'need_range' => [
            'type' => DbTypes::TYPE_BOOL,
            'default' => 0,
        ],
        'external_module_name' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 64,
        ],
        'shipping_method' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
        'position' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
        'max_width' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
        'max_height' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
        'max_depth' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
        'max_weight' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
        'grade' => [
            'type' => DbTypes::TYPE_INT,
            'default' => 0,
        ],
    ];
}
