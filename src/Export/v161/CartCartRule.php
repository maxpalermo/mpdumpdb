<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartCartRule extends TemplateExportController
{
    protected $table_name = 'cart_cart_rule';
    protected $fields = [
        'id_cart' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_cart_rule' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
    ];
}
