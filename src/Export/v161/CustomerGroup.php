<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class CustomerGroup extends TemplateExportController
{
    protected $table_name = 'customer_group';
    protected $fields = [
        'id_customer' => ['type' => DbTypes::TYPE_INT,  'primary' => true],
        'id_group' => ['type' => DbTypes::TYPE_INT, 'primary' => true],
    ];
}
