<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class SMS extends BaseRequest
{
    /** @var ?string */
    public $subscription_group_id;

    /** @var ?string */
    public $message_variation_id;

    /** @var ?string */
    public $body;

    /** @var ?string */
    public $app_id;

    /** @var ?array */
    public $media_items;

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
