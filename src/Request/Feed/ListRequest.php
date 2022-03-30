<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Feed;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    public ?int $page = null;

    public ?bool $include_archived = null;

    public ?string $sort_direction = null;
}
