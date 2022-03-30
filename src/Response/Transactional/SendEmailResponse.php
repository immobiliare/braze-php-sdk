<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Transactional;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class SendEmailResponse extends BaseResponse
{
    public ?string $dispatch_id = null;

    public ?string $status = null;

    public ?array $metadata = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->metadata = $params['metadata'] ?? [];
    }
}
