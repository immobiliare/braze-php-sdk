<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\MergeUpdate;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class MergeRequest extends BaseRequest
{
    /** @var ?MergeUpdate[] */
    public ?array $merge_updates = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (empty($this->merge_updates)) {
            throw new ValidationException('The "merge_updates" field must be non empty');
        }

        foreach ($this->merge_updates as $merge_update) {
            $merge_update->validate($strict);
        }
    }
}
