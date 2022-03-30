<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\ExternalIDRename;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class RemoveExternalIDRequest extends BaseRequest
{
    /** @var ?string[] */
    public ?array $external_ids = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_ids) {
            throw new ValidationException('The "external_ids" field is required');
        }
    }
}
