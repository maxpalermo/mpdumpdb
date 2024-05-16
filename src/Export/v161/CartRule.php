<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CartRule extends TemplateExportController
{
    protected $table_name = 'cart_rule';
    protected $fields = [
        'id_cart_rule' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_customer' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'date_from' => [
            'type' => DbTypes::TYPE_DATE,
        ],
        'date_to' => [
            'type' => DbTypes::TYPE_DATE,
        ],
        'description' => [
            'type' => DbTypes::TYPE_VARCHAR,
        ],
        'quantity' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'quantity_per_user' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'priority' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'partial_use' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'code' => [
            'type' => DbTypes::TYPE_VARCHAR,
        ],
        'minimum_amount' => [
            'type' => DbTypes::TYPE_FLOAT,
        ],
        'minimum_amount_tax' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'minimum_amount_currency' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'minimum_amount_shipping' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'country_restriction' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'carrier_restriction' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'group_restriction' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'cart_rule_restriction' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'product_restriction' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'shop_restriction' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'free_shipping' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'reduction_percent' => [
            'type' => DbTypes::TYPE_FLOAT,
        ],
        'reduction_amount' => [
            'type' => DbTypes::TYPE_FLOAT,
        ],
        'reduction_tax' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'reduction_currency' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'reduction_product' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'gift_product' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'gift_product_attribute' => [
            'type' => DbTypes::TYPE_INT,
        ],
        'highlight' => [
            'type' => DbTypes::TYPE_BOOL,
        ],
        'active' => [
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
