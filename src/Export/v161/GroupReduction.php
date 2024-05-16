<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class GroupReduction extends TemplateExportController
{
    protected $table_name = 'group_reduction';
    protected $fields = [
        'id_group_reduction' => ['type' => DbTypes::TYPE_INT, 'autoincrement' => true, 'primary' => true],
        'id_group' => ['type' => DbTypes::TYPE_INT, 'index' => true, 'null' => false],
        'id_category' => ['type' => DbTypes::TYPE_INT, 'index' => true, 'null' => false],
        'reduction' => ['type' => DbTypes::TYPE_DECIMAL, 'length' => 4, 'precision' => 3, 'index' => false, 'null' => false],
    ];
}
