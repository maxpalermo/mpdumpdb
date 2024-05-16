<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class AttachmentLang extends TemplateExportController
{
    protected $table_name = 'attachment_lang';
    protected $fields = [
        'id_attachment' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'auto_increment' => true,
            'primary_key' => true,
        ],
        'id_lang' => [
            'type' => DbTypes::TYPE_INT,
            'length' => 10,
            'unsigned' => true,
            'primary_key' => true,
        ],
        'name' => [
            'type' => DbTypes::TYPE_VARCHAR,
            'length' => 32,
            'null' => false,
        ],
        'description' => [
            'type' => DbTypes::TYPE_TEXT,
            'null' => false,
        ],
    ];
}
