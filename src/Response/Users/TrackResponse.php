<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class TrackResponse extends BaseResponse
{
    /** @var ?int */
    public $attributes_processed = null;

    /** @var ?int */
    public $events_processed = null;

    /** @var ?int */
    public $purchases_processed = null;
}
