<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

/**
 * @see https://www.braze.com/docs/api/objects_filters/event_object/
 */
class Event extends BaseObject
{
    public ?string $external_id = null;

    public ?UserAlias $user_alias = null;

    public ?string $braze_id = null;

    public ?string $app_id = null;

    public ?string $name = null;

    public ?DateTimeInterface $time = null;

    public ?array $properties = null;

    public ?bool $_update_existing_only = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id && null === $this->user_alias && null === $this->braze_id) {
            throw new ValidationException('One of "external_id", "user_alias" or "braze_id" Event fields is required');
        }

        if (null === $this->name) {
            throw new ValidationException('Event\'s name property is required');
        }

        if (null === $this->time) {
            throw new ValidationException('Event\'s time property is required');
        }
    }
}
