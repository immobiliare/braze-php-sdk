<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ApplePushActionButton extends BaseRequest
{
    public ?string $action_id = null;

    public ?string $action = null;

    public ?string $uri = null;

    public ?bool $use_webview = null;

    public function validate(bool $strict): void
    {
        if (null === $this->action_id) {
            throw new ValidationException('The "action_id" field is required');
        }
    }
}
