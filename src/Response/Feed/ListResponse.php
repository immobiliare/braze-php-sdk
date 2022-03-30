<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Feed;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    public ?array $cards = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->cards = $params['cards'] ?? [];
    }
}
