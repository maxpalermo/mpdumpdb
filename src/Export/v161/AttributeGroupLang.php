<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class AttributeGroupLang extends TemplateExportController
{
    protected $table_name = 'attribute_group_lang';
    protected $fields = [
        'id_attribute_group' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'primary_key' => true,
        ],
        'id_lang' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'primary_key' => true,
        ],
        'name' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 128,
            'null' => false,
        ],
        'public_name' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 128,
            'null' => false,
        ],
    ];
}
