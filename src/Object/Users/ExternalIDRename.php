<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class ExternalIDRename extends BaseObject
{
    /** @var ?string */
    public $current_external_id;

    /** @var ?string */
    public $new_external_id;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->current_external_id) {
            throw new ValidationException('The "current_external_id" field is required');
        }

        if (null === $this->new_external_id) {
            throw new ValidationException('The "new_external_id" field is required');
        }

        if ($this->current_external_id === $this->new_external_id) {
            throw new ValidationException('The "current_external_id" and "new_external_id" fields cannot be the same');
        }
    }
}
