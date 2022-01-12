<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ExportByIdentifierResponse extends BaseResponse
{
    /** @var ?array */
    public $users;

    /** @var ?array */
    public $invalid_user_ids;

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
