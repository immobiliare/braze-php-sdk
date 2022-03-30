<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Email;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class QueryHardBouncedResponse extends BaseResponse
{
    public ?array $emails = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->emails = $params['emails'] ?? [];
    }
}
