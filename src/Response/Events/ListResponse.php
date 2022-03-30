<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Events;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?string[] */
    public ?array $events = null;
}
