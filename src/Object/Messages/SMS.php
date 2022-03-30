<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class SMS extends BaseRequest
{
    public ?string $subscription_group_id = null;

    public ?string $message_variation_id = null;

    public ?string $body = null;

    public ?string $app_id = null;

    public ?array $media_items = null;

    public function validate(bool $strict): void
    {
        if (null === $this->subscription_group_id) {
            throw new ValidationException('The "subscription_group_id" field is required');
        }

        if (null === $this->body) {
            throw new ValidationException('The "body" field is required');
        }

        if (null === $this->app_id) {
            throw new ValidationException('The "app_id" field is required');
        }
    }
}
