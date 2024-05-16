<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Attachment extends TemplateExportController
{
    protected $table_name = 'attachment';
    protected $fields = [
        'id_attachment' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'auto_increment' => true,
            'primary_key' => true,
        ],
        'file' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 40,
            'null' => false,
        ],
        'file_name' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 128,
            'null' => false,
        ],
        'file_size' => [
            'type' => DbTypes::TYPE_BIGINT,
            'length' => 10,
            'unsigned' => true,
            'null' => false,
        ],
        'mime' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 128,
            'null' => false,
        ],
    ];
}
