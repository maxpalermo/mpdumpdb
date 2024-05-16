<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class GroupShop extends TemplateExportController
{
    protected $table_name = 'group_shop';
    protected $fields = [
        'id_group' => ['type' => DbTypes::TYPE_INT, 'primary' => true, 'null' => false],
        'id_shop' => ['type' => DbTypes::TYPE_INT, 'primary' => true, 'null' => false],
    ];
}
