<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListUserGroupsRequest extends BaseRequest
{
    /** @var ?string|string[] */
    public string|array|null $external_id = null;

    /** @var ?string|string[] */
    public string|array|null $email = null;

    /** @var ?string|string[] */
    public string|array|null $phone = null;

    public ?int $limit = null;

    public ?int $offset = null;
}
