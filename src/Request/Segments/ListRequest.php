<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Segments;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    /** @var ?int */
    public $page;

    /** @var ?string */
    public $sort_direction;
}
