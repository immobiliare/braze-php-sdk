<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class UpdateStatusRequest extends BaseRequest
{
    public ?string $subscription_group_id = null;

    public ?string $subscription_state = null;

    /** @var ?string|string[] */
    public string|array|null $external_id = null;

    /** @var ?string|string[] */
    public string|array|null $email = null;

    /** @var ?string|string[] */
    public string|array|null $phone = null;

    public function validate(bool $strict): void
    {
        if (null === $this->subscription_group_id) {
            throw new ValidationException('The "subscription_group_id" field is required');
        }

        if (null === $this->subscription_state) {
            throw new ValidationException('The "subscription_state" field is required');
        }
    }
}
