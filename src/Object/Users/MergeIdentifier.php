<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;

class MergeIdentifier extends BaseObject
{
    public ?string $external_id = null;

    public ?UserAlias $user_alias = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id && null === $this->user_alias) {
            throw new ValidationException('One of "external_id" or "user_alias" fields is required');
        }

        if (null !== $this->external_id && null !== $this->user_alias) {
            throw new ValidationException('Only one of "external_id" and "user_alias" fields must be set');
        }

        $this->user_alias?->validate($strict);
    }
}
