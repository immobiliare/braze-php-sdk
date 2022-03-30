<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class KindlePush extends BaseRequest
{
    public ?string $alert = null;

    public ?string $title = null;

    public ?array $extra = null;

    public ?string $message_variation_id = null;

    public ?int $priority = null;

    public ?string $collapse_key = null;

    public ?string $sound = null;

    public ?string $custom_uri = null;

    public function validate(bool $strict): void
    {
        if (null === $this->alert) {
            throw new ValidationException('The "alert" field is required');
        }

        if (null === $this->title) {
            throw new ValidationException('The "title" field is required');
        }
    }
}
