<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Campaigns;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class TriggerSendResponse extends BaseResponse
{
    /** @var ?string */
    public $dispatch_id;

    /** @var ?string */
    public $notice;
}
