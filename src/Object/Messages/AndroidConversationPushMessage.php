<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AndroidConversationPushMessage extends BaseRequest
{
    public ?string $text = null;

    public ?int $timestamp = null;

    public ?string $person_id = null;

    public function validate(bool $strict): void
    {
        if (null === $this->text) {
            throw new ValidationException('The "text" field is required');
        }

        if (null === $this->timestamp) {
            throw new ValidationException('The "timestamp" field is required');
        }

        if (null === $this->person_id) {
            throw new ValidationException('The "person_id" field is required');
        }
    }
}
