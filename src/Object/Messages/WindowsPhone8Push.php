<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class WindowsPhone8Push extends BaseRequest
{
    /** @var ?string */
    public $push_type;

    /** @var ?string */
    public $toast_title;

    /** @var ?string */
    public $toast_content;

    /** @var ?string */
    public $toast_navigation_uri;

    /** @var ?array */
    public $toast_hash;

    /** @var ?string */
    public $message_variation_id;

    public function validate(bool $strict): void
    {
        if (null === $this->toast_content) {
            throw new ValidationException('The "toast_content" field is required');
        }
    }
}
