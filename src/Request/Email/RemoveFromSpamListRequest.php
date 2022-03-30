<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Email;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class RemoveFromSpamListRequest extends BaseRequest
{
    /** @var ?string|?array */
    public $email = null;

    public function validate(bool $strict): void
    {
        if (null === $this->email) {
            throw new ValidationException('The "email" field is required');
        }
    }
}
