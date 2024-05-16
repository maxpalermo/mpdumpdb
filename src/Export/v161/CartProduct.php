<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartProduct extends TemplateExportController
{
    protected $table_name = 'cart_product';
    protected $fields = [
        'id_cart' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_product' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_address_delivery' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_shop' => [
            'type' => DbTypes::TYPE_INT,
            'index' => 'index',
        ],
        'id_product_attribute' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'quantity' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'date_add' => [
            'type' => DbTypes::TYPE_DATE,
        ],
    ];
}
