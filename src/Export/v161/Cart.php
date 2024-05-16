<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Cart extends TemplateExportController
{
    protected $table_name = 'cart';
    protected $fields = [
        'id_cart' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
            'autoincrement' => true,
        ],
        'id_shop_group' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'id_shop' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'id_carrier' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'delivery_option' => [
            'type' => DbTypes::TYPE_TEXT,
        ],
        'id_lang' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'id_address_delivery' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'id_address_invoice' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'id_currency' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'id_customer' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'id_guest' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'secure_key' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 32,
        ],
        'recyclable' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'gift' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'gift_message' => [
            'type' => DbTypes::TYPE_TEXT,
        ],
        'mobile_theme' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'allow_seperated_package' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'date_add' => [
            'type' => DbTypes::TYPE_DATE,
        ],
        'date_upd' => [
            'type' => DbTypes::TYPE_DATE,
        ],
    ];
}
