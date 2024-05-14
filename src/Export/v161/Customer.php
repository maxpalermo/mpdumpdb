<?php

namespace MpSoft\MpDumpDb\Export\v161;

use MpSoft\MpDumpDb\Export\TemplateExportController;
use MpSoft\MpDumpDb\Helpers\DbTypes;

class Customer extends TemplateExportController
{
    protected $table_name = 'customer';
    protected $fields = [
        'id_customer' => ['type' => DbTypes::TYPE_INT, 'autoincrement' => true, 'primary' => true],
        'id_shop_group' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => false],
        'id_shop' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => false],
        'id_gender' => ['type' => DbTypes::TYPE_INT, 'index' => true, null => false],
        'id_default_group' => ['type' => DbTypes::TYPE_INT, 'index' => false, null => false],
        'id_lang' => ['type' => DbTypes::TYPE_INT, 'index' => false, null => true],
        'id_risk' => ['type' => DbTypes::TYPE_INT, 'index' => false, null => false],
        'company' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 64, 'index' => false, null => true],
        'siret' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 14, 'index' => false, null => true],
        'ape' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 5, 'index' => false, null => true],
        'firstname' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => true, null => false],
        'lastname' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => true, null => false],
        'email' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 128, 'index' => true, null => false],
        'passwd' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => true, null => false],
        'last_passwd_gen' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, null => false, 'timestamp' => true],
        'birthday' => ['type' => DbTypes::TYPE_DATE, 'index' => false, null => true],
        'newsletter' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
        'ip_registration_newsletter' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 15, 'index' => false, null => true],
        'newsletter_date_add' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, null => true, 'timestamp' => false],
        'optin' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
        'website' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 128, 'index' => false, null => true],
        'outstanding_allow_amount' => ['type' => DbTypes::TYPE_DECIMAL, 'length' => 20, 'precision' => 6, 'index' => false, null => false],
        'show_public_prices' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
        'max_payment_days' => ['type' => DbTypes::TYPE_INT, 'index' => false, null => false],
        'secure_key' => ['type' => DbTypes::TYPE_VARCHAR, 'length' => 32, 'index' => false, null => false],
        'note' => ['type' => DbTypes::TYPE_TEXT, 'index' => false, null => true],
        'active' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
        'is_guest' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
        'deleted' => ['type' => DbTypes::TYPE_BOOL, 'index' => false, null => false],
        'date_add' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, null => false, 'timestamp' => false],
        'date_upd' => ['type' => DbTypes::TYPE_DATETIME, 'index' => false, null => false, 'timestamp' => false],
    ];
}
