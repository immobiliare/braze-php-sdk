<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Canvas;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class SummaryResponse extends BaseResponse
{
    /** @var ?array */
    public $data;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->data = $params['data'] ?? [];
    }
}
