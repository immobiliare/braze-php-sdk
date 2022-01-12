<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListUserGroupsRequest extends BaseRequest
{
    /** @var ?string|string[] */
    public $external_id;

    /** @var ?string|string[] */
    public $email;

    /** @var ?string|string[] */
    public $phone;

    /** @var ?int */
    public $limit;

    /** @var ?int */
    public $offset;
}
