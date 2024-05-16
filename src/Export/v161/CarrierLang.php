<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CarrierLang extends TemplateExportController
{
    protected $table_name = 'carrier_lang';
    protected $fields = [
        'id_carrier' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_shop' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_lang' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'delay' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 64,
        ],
    ];
}
