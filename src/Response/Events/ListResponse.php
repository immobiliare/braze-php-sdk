<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Events;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?string[] */
    public ?array $events = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        $this->events = $params['events'];
    }
}
