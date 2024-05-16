<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class GroupLang extends TemplateExportController
{
    protected $table_name = 'group_lang';
    protected $fields = [
        'id_group' => ['type' => DbTypes::TYPE_INT, 'autoincrement' => false, 'primary' => true],
        'id_lang' => ['type' => DbTypes::TYPE_INT, 'primary' => true],
        'name' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => false, 'null' => false],
    ];
}
