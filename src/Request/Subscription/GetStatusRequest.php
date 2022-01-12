<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class GetStatusRequest extends BaseRequest
{
    /** @var ?string */
    public $subscription_group_id;

    /** @var ?string|string[] */
    public $external_id;

    /** @var ?string|string[] */
    public $email;

    /** @var ?string|string[] */
    public $phone;

    public function validate(bool $strict): void
    {
        if (null === $this->subscription_group_id) {
            throw new ValidationException('The "subscription_group_id" field is required');
        }
    }
}
