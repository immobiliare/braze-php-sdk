<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListUserGroupsRequest extends BaseRequest
{
    /** @var ?string|string[] */
    public $external_id = null;

    /** @var ?string|string[] */
    public $email = null;

    /** @var ?string|string[] */
    public $phone = null;

    public ?int $limit = null;

    public ?int $offset = null;
}
