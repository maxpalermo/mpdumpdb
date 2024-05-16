<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Alias extends TemplateExportController
{
    protected $table_name = 'alias';
    protected $fields = [
        'id_alias' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'auto_increment' => true,
            'primary_key' => true,
        ],
        'alias' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 255,
            'index' => 'index',
            'null' => false,
        ],
        'search' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 255,
            'null' => false,
        ],
        'active' => [
            'type' => DbTypes::TYPE_BOOL,
            'length' => 1,
            'default' => 1,
            'null' => false,
        ],
    ];
}
