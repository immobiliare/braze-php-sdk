<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Campaigns;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class TriggerSendResponse extends BaseResponse
{
    public ?string $dispatch_id = null;

    public ?string $notice = null;
}
