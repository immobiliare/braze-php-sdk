<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Kpi;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DailyActiveUsersResponse extends BaseResponse
{
    public ?array $data = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->data = $params['data'] ?? [];
    }
}
