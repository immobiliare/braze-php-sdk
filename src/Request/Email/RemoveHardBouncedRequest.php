<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Email;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class RemoveHardBouncedRequest extends BaseRequest
{
    /** @var ?string|?array */
    public $email;

    public function validate(bool $strict): void
    {
        if (null === $this->email) {
            throw new ValidationException('The "email" field is required');
        }
    }
}
