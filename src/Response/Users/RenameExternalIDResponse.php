<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class RenameExternalIDResponse extends BaseResponse
{
    public ?array $external_ids = null;

    public ?array $rename_errors = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        if (isset($params['external_ids']) && is_array($params['external_ids'])) {
            $this->external_ids = $params['external_ids'];
        }

        if (isset($params['rename_errors']) && is_array($params['rename_errors'])) {
            $this->rename_errors = $params['rename_errors'];
        }
    }
}
