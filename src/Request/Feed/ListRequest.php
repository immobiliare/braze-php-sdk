<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Feed;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    /** @var ?int */
    public $page;

    /** @var ?bool */
    public $include_archived;

    /** @var ?string */
    public $sort_direction;
}
