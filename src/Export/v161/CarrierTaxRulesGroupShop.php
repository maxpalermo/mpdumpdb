<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CarrierTaxRulesGroupShop extends TemplateExportController
{
    protected $table_name = 'carrier_tax_rules_group_shop';
    protected $fields = [
        'id_carrier' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_tax_rules_group' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_shop' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
    ];
}
