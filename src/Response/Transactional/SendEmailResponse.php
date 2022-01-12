<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Transactional;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class SendEmailResponse extends BaseResponse
{
    /** @var ?string */
    public $dispatch_id;

    /** @var ?string */
    public $status;

    /** @var ?array */
    public $metadata;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->metadata = $params['metadata'] ?? [];
    }
}
