<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

/**
 * @see https://www.braze.com/docs/api/objects_filters/user_alias_object/
 */
class UserAlias extends BaseObject
{
    public ?string $alias_name = null;

    public ?string $alias_label = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->alias_name) {
            throw new ValidationException('The "alias_name" field is required');
        }

        if (null === $this->alias_label) {
            throw new ValidationException('The "alias_label" field is required');
        }
    }
}
