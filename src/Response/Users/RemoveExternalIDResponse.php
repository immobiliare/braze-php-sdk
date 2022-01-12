<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class RemoveExternalIDResponse extends BaseResponse
{
    /** @var ?array */
    public $removed_ids = null;

    /** @var ?array */
    public $removal_errors = null;

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
