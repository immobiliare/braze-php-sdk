<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class TrackResponse extends BaseResponse
{
    public ?int $attributes_processed = null;

    public ?int $events_processed = null;

    public ?int $purchases_processed = null;
}
