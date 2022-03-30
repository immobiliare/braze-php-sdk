<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Segments;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    public ?int $page = null;

    public ?string $sort_direction = null;
}
