<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class AttributeGroup extends TemplateExportController
{
    protected $table_name = 'attribute_group';
    protected $fields = [
        'id_attribute_group' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'auto_increment' => true,
            'primary_key' => true,
        ],
        'is_color_group' => [
            'type' => DbTypes::TYPE_BOOL,
            'null' => false,
        ],
        'group_type' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 3,
            'unsigned' => true,
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
