<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class AttributeGroupShop extends TemplateExportController
{
    protected $table_name = 'attribute_group_shop';
    protected $fields = [
        'id_attribute_group' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'null' => false,
        ],
        'id_shop' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'null' => false,
        ],
    ];
}
