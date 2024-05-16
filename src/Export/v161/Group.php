<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Group extends TemplateExportController
{
    protected $table_name = 'group';
    protected $fields = [
        'id_group' => ['type' => DbTypes::TYPE_INT, 'autoincrement' => true, 'primary' => true],
        'reduction' => ['type' => DbTypes::TYPE_DECIMAL, 'length' => 3, 'precision' => 3, 'index' => false, 'null' => false],
        'price_display_method' => ['type' => DbTypes::TYPE_INT, 'index' => false, 'null' => false],
        'show_prices' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, 'null' => false],
        'date_add' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, 'null' => false, 'timestamp' => false],
        'date_upd' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, 'null' => false, 'timestamp' => false],
    ];
}
