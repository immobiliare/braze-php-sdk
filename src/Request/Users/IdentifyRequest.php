<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\AliasToIdentify;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class IdentifyRequest extends BaseRequest
{
    /** @var ?AliasToIdentify[] */
    public $aliases_to_identify;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->aliases_to_identify) {
            throw new ValidationException('The "aliases_to_identify" field is required');
        }

        $aliasesToIdentifyLooseValid = $this->validateCollection($this->aliases_to_identify, $strict);

        if (!$aliasesToIdentifyLooseValid) {
            throw new ValidationException('At least one "alias to identify" must be valid');
        }
    }
}
