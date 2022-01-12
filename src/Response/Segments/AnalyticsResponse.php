<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Segments;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class AnalyticsResponse extends BaseResponse
{
    /** @var ?array */
    public $data;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->data = $params['data'] ?? [];
    }
}
