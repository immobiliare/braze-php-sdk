<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Email;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ChangeSubscriptionStatusRequest extends BaseRequest
{
    /** @var ?string|?array */
    public $email = null;

    public ?string $subscription_state = null;

    public function validate(bool $strict): void
    {
        if (null === $this->email) {
            throw new ValidationException('The "email" field is required');
        }

        if (null === $this->subscription_state) {
            throw new ValidationException('The "subscription_state" field is required');
        }
    }
}
