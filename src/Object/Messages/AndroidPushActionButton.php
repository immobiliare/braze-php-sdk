<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AndroidPushActionButton extends BaseRequest
{
    public ?string $text = null;

    public ?string $action = null;

    public ?string $uri = null;

    public ?bool $use_webview = null;

    public function validate(bool $strict): void
    {
        if (null === $this->text) {
            throw new ValidationException('The "text" field is required');
        }
    }
}
