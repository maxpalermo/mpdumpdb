<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartRuleGroup extends TemplateExportController
{
    protected $table_name = 'cart_rule_group';
    protected $fields = [
        'id_cart_rule' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_group' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
    ];
}
