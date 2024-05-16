<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartRuleProductRule extends TemplateExportController
{
    protected $table_name = 'cart_rule_product_rule';
    protected $fields = [
        'id_product_rule' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_product_rule_group' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'type' => [
            'type' => DbTypes::TYPE_ENUM,
            'enum' => ['products', 'categories', 'attributes', 'manufactures', 'suppliers'],
        ],
    ];
}
