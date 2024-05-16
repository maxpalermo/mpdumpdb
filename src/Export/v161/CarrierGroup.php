<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CarrierGroup extends TemplateExportController
{
    protected $table_name = 'carrier_group';
    protected $fields = [
        'id_carrier' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
            'autoincrement' => true,
        ],
        'id_group' => [
            'type' => DbTypes::TYPE_INT,
            'primary' => true,
            'autoincrement' => true,
        ],
    ];
}
