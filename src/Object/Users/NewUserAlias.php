<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class NewUserAlias extends BaseObject
{
    /** @var ?string */
    public $external_id;

    /** @var ?string */
    public $alias_name;

    /** @var ?string */
    public $alias_label;

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
