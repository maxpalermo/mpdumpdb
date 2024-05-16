<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartRuleLang extends TemplateExportController
{
    protected $table_name = 'cart_rule_lang';
    protected $fields = [
        'id_cart_rule' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_lang' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'name' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 255,
        ],
    ];
}
