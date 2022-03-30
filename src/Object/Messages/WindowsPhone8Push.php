<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class WindowsPhone8Push extends BaseRequest
{
    public ?string $push_type = null;

    public ?string $toast_title = null;

    public ?string $toast_content = null;

    public ?string $toast_navigation_uri = null;

    public ?array $toast_hash = null;

    public ?string $message_variation_id = null;

    public function validate(bool $strict): void
    {
        if (null === $this->toast_content) {
            throw new ValidationException('The "toast_content" field is required');
        }
    }
}
