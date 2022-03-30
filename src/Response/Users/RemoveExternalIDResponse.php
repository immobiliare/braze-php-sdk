<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class RemoveExternalIDResponse extends BaseResponse
{
    public ?array $removed_ids = null;

    public ?array $removal_errors = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        if (isset($params['removed_ids']) && is_array($params['removed_ids'])) {
            $this->removed_ids = $params['removed_ids'];
        }

        if (isset($params['removal_errors']) && is_array($params['removal_errors'])) {
            $this->removal_errors = $params['removal_errors'];
        }
    }
}
