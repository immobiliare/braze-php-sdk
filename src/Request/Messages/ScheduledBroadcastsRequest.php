<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Messages;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ScheduledBroadcastsRequest extends BaseRequest
{
    public ?DateTimeInterface $end_time = null;

    public function validate(bool $strict): void
    {
        if (null === $this->end_time) {
            throw new ValidationException('The "end_time" field is required');
        }
    }
}
