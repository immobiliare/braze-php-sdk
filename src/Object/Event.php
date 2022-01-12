<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

/**
 * @see https://www.braze.com/docs/api/objects_filters/event_object/
 */
class Event extends BaseObject
{
    /** @var ?string */
    public $external_id;

    /** @var ?UserAlias */
    public $user_alias;

    /** @var ?string */
    public $braze_id;

    /** @var ?string */
    public $app_id;

    /** @var ?string */
    public $name;

    /** @var ?DateTimeInterface */
    public $time;

    /** @var ?array */
    public $properties;

    /** @var ?bool */
    public $_update_existing_only;

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
