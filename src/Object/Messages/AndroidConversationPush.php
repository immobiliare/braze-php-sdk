<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AndroidConversationPush extends BaseRequest
{
    public ?string $shortcut_id = null;

    public ?string $reply_person_id = null;

    /** @var ?AndroidConversationPushMessage[] */
    public ?array $messages = null;

    /** @var ?AndroidConversationPushPerson[] */
    public ?array $persons = null;

    public function validate(bool $strict): void
    {
        if (null === $this->shortcut_id) {
            throw new ValidationException('The "shortcut_id" field is required');
        }

        if (null === $this->reply_person_id) {
            throw new ValidationException('The "reply_person_id" field is required');
        }

        if (null === $this->messages) {
            throw new ValidationException('The "messages" field is required');
        }

        if (null === $this->persons) {
            throw new ValidationException('The "persons" field is required');
        }
    }
}
