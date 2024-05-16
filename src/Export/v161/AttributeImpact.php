<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class AttributeImpact extends TemplateExportController
{
    protected $table_name = 'attribute_impact';
    protected $fields = [
        'id_attribute_impact' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'auto_increment' => true,
            'primary_key' => true,
        ],
        'id_product' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'null' => false,
            'index' => 'unique',
        ],
        'id_attribute' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'null' => false,
            'index' => 'unique',
        ],
        'weight' => [
            'type' => DbTypes::TYPE_DECIMAL,
            'length' => 20,
            'precision' => 6,
            'null' => false,
        ],
        'price' => [
            'type' => DbTypes::TYPE_DECIMAL,
            'length' => '20',
            'precision' => 6,
            'null' => false,
        ],
    ];
}
