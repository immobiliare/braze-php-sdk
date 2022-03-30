<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ExportByIdentifierResponse extends BaseResponse
{
    public ?array $users = null;

    public ?array $invalid_user_ids = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        if (isset($params['users']) && is_array($params['users'])) {
            $this->users = $params['users'];
        }

        if (isset($params['invalid_user_ids']) && is_array($params['invalid_user_ids'])) {
            $this->invalid_user_ids = $params['invalid_user_ids'];
        }
    }
}
