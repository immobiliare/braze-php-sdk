<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class MergeUpdate extends BaseObject
{
    public ?MergeIdentifier $identifier_to_merge = null;

    public ?MergeIdentifier $identifier_to_keep = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->identifier_to_merge) {
            throw new ValidationException('The "identifier_to_merge" field is required');
        }

        if (null === $this->identifier_to_keep) {
            throw new ValidationException('The "identifier_to_keep" field is required');
        }

        $this->identifier_to_merge->validate($strict);
        $this->identifier_to_keep->validate($strict);
    }
}
