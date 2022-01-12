<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AndroidPushActionButton extends BaseRequest
{
    /** @var ?string */
    public $text;

    /** @var ?string */
    public $action;

    /** @var ?string */
    public $uri;

    /** @var ?bool */
    public $use_webview;

    public function validate(bool $strict): void
    {
        if (null === $this->text) {
            throw new ValidationException('The "text" field is required');
        }
    }
}
