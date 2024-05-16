<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Attribute extends TemplateExportController
{
    protected $table_name = 'attribute';
    protected $fields = [
        'id_attribute' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'auto_increment' => true,
            'primary_key' => true,
        ],
        'id_attribute_group' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'null' => false,
        ],
        'color' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 7,
            'null' => false,
        ],
        'position' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'null' => false,
        ],
    ];
}
