<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ExportByIdentifierRequest extends BaseRequest
{
    /** @var ?string[] */
    public $external_ids;

    /** @var ?UserAlias[] */
    public $user_aliases;

    /** @var ?string */
    public $device_id;

    /** @var ?string */
    public $braze_id;

    /** @var ?string */
    public $email_address;

    /** @var ?string */
    public $phone;

    /** @var ?string[] */
    public $fields_to_export;
}
