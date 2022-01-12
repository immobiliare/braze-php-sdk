<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Kpi;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DailyUninstallsResponse extends BaseResponse
{
    /** @var ?array */
    public $data;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->data = $params['data'] ?? [];
    }
}
