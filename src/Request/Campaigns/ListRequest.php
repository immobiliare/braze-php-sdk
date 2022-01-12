<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

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
