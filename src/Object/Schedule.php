<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

class Schedule extends BaseObject
{
    public ?DateTimeInterface $time = null;

    public ?bool $in_local_time = null;

    public ?bool $at_optimal_time = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->time) {
            throw new ValidationException('The "time" field is required');
        }
    }
}
