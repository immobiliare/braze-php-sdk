<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class TriggerSendRequest extends BaseRequest
{
    public ?string $canvas_id = null;

    public ?array $canvas_entry_properties = null;

    public ?bool $broadcast = null;

    public ?array $audience = null;

    /** @var ?Recipient[] */
    public ?array $recipients = null;

    public function validate(bool $strict): void
    {
        if (null === $this->canvas_id) {
            throw new ValidationException('The "canvas_id" field is required');
        }
    }
}
