<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CarrierZone extends TemplateExportController
{
    protected $table_name = 'carrier_zone';
    protected $fields = [
        'id_carrier' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
        'id_zone' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
        ],
    ];
}
