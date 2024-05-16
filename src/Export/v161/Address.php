<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Address extends TemplateExportController
{
    protected $table_name = 'address';
    protected $fields = [
        'id_address' => ['type' => DbTypes::TYPE_INT, 'autoincrement' => true, 'primary' => true],
        'id_country' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => false],
        'id_state' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => true],
        'id_customer' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => false],
        'id_manufacturer' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => true],
        'id_supplier' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => true],
        'id_warehouse' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => true],
        'alias' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => false, null => false],
        'company' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 64, 'index' => false, null => true],
        'lastname' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => true, null => false],
        'firstname' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => true, null => false],
        'address1' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 128, 'index' => false, null => false],
        'address2' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 128, 'index' => false, null => true],
        'postcode' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 12, 'index' => false, null => false],
        'city' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 64, 'index' => false, null => false],
        'other' => ['type' => DbTypes::TYPE_TEXT, 'index' => false, null => true],
        'phone' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 16, 'index' => false, null => true],
        'phone_mobile' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 16, 'index' => false, null => true],
        'vat_number' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => false, null => true],
        'dni' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 16, 'index' => false, null => true],
        'date_add' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, null => false, 'timestamp' => false],
        'date_upd' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, null => false, 'timestamp' => false],
        'active' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
        'deleted' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
    ];
}
