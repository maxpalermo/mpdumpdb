<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartRuleCombination extends TemplateExportController
{
    protected $table_name = 'cart_rule_combination';
    protected $fields = [
        'id_cart_rule_1' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_cart_rule_2' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
    ];
}
