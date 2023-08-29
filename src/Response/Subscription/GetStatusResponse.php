<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Subscription;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class GetStatusResponse extends BaseResponse
{
    public ?array $status = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        $this->status = $params['status'] ?? [];
    }
}
