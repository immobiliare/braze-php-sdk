<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DeleteRequest extends BaseRequest
{
    /** @var ?string[] */
    public $external_ids;

    /** @var ?UserAlias[] */
    public $user_aliases;

    /** @var ?string[] */
    public $braze_ids;
}
