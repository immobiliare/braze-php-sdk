<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Events;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    public ?int $page = null;
}
