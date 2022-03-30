<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DeleteRequest extends BaseRequest
{
    /** @var ?string[] */
    public ?array $external_ids = null;

    /** @var ?UserAlias[] */
    public ?array $user_aliases = null;

    /** @var ?string[] */
    public ?array $braze_ids = null;
}
