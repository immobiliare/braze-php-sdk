<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ExportByIdentifierRequest extends BaseRequest
{
    /** @var ?string[] */
    public ?array $external_ids = null;

    /** @var ?UserAlias[] */
    public ?array $user_aliases = null;

    public ?string $device_id = null;

    public ?string $braze_id = null;

    public ?string $email_address = null;

    public ?string $phone = null;

    /** @var ?string[] */
    public ?array $fields_to_export = null;
}
