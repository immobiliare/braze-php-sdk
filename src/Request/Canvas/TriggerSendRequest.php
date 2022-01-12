<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class TriggerSendRequest extends BaseRequest
{
    /** @var ?string */
    public $canvas_id;

    /** @var ?array */
    public $canvas_entry_properties;

    /** @var ?bool */
    public $broadcast;

    /** @var ?array */
    public $audience;

    /** @var ?Recipient[] */
    public $recipients;

    public function validate(bool $strict): void
    {
        if (null === $this->canvas_id) {
            throw new ValidationException('The "canvas_id" field is required');
        }
    }
}
