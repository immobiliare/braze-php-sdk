<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Email;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class QueryHardBouncedResponse extends BaseResponse
{
    /** @var ?array */
    public $emails;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->emails = $params['emails'] ?? [];
    }
}
