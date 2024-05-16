<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartRuleProductRuleValue extends TemplateExportController
{
    protected $table_name = 'cart_rule_product_rule_value';
    protected $fields = [
        'id_product_rule' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_item' => [
            'type' => DbTypes::TYPE_INT,
        ],
    ];
}
