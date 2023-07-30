<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Messages;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ScheduledBroadcastsResponse extends BaseResponse
{
    public ?array $scheduled_broadcasts = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        $this->scheduled_broadcasts = $params['scheduled_broadcasts'];
    }
}
