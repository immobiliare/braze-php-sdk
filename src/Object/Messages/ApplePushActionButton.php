<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ApplePushActionButton extends BaseRequest
{
    /** @var ?string */
    public $action_id;

    /** @var ?string */
    public $action;

    /** @var ?string */
    public $uri;

    /** @var ?bool */
    public $use_webview;

    public function validate(bool $strict): void
    {
        if (null === $this->action_id) {
            throw new ValidationException('The "action_id" field is required');
        }
    }
}
