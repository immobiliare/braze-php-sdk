<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

/**
 * @see https://www.braze.com/docs/api/objects_filters/aliases_to_identify/
 */
class AliasToIdentify extends BaseObject
{
    public ?string $external_id = null;

    public ?UserAlias $user_alias = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id) {
            throw new ValidationException('The "external_id" field is required');
        }

        if (null === $this->user_alias) {
            throw new ValidationException('The "user_alias" field is required');
        }
    }
}
