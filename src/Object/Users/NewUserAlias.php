<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class NewUserAlias extends BaseObject
{
    public ?string $external_id = null;

    public ?string $alias_name = null;

    public ?string $alias_label = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id) {
            throw new ValidationException('The "external_id" field is required');
        }

        if (null === $this->alias_name) {
            throw new ValidationException('The "alias_name" field is required');
        }

        if (null === $this->alias_label) {
            throw new ValidationException('The "alias_label" field is required');
        }
    }
}
