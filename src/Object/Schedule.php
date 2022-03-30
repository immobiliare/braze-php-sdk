<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

class Schedule extends BaseObject
{
    /** @var ?DateTimeInterface */
    public $time;

    /** @var bool */
    public $in_local_time;

    /** @var bool */
    public $at_optimal_time;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->time) {
            throw new ValidationException('The "time" field is required');
        }
    }
}
