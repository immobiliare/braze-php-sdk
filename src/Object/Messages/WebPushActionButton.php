<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class WebPushActionButton extends BaseRequest
{
    /** @var ?string */
    public $text;

    /** @var ?string */
    public $action;

    /** @var ?string */
    public $uri;

    public function validate(bool $strict): void
    {
        if (null === $this->text) {
            throw new ValidationException('The "text" field is required');
        }
    }
}
