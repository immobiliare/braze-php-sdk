<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Segments;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?array */
    public $segments;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->segments = $params['segments'] ?? [];
    }
}
