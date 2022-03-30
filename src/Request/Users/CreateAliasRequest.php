<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\NewUserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateAliasRequest extends BaseRequest
{
    /** @var ?NewUserAlias[] */
    public ?array $user_aliases = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->user_aliases) {
            throw new ValidationException('The "user_aliases" field is required');
        }

        $userAliasesLooseValid = $this->validateCollection($this->user_aliases, $strict);

        if (!$userAliasesLooseValid) {
            throw new ValidationException('At least one "user alias" must be valid');
        }
    }
}
