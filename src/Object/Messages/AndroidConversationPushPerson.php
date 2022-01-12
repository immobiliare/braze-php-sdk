<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AndroidConversationPushPerson extends BaseRequest
{
    /** @var ?string */
    public $id;

    /** @var ?string */
    public $name;

    public function validate(bool $strict): void
    {
        if (null === $this->id) {
            throw new ValidationException('The "id" field is required');
        }

        if (null === $this->name) {
            throw new ValidationException('The "name" field is required');
        }
    }
}
