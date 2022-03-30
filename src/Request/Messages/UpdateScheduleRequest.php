<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class UpdateScheduleRequest extends BaseRequest
{
    public ?string $schedule_id = null;

    public ?Schedule $schedule = null;

    public ?Messages $messages = null;

    public function validate(bool $strict): void
    {
        if (null === $this->schedule_id) {
            throw new ValidationException('The "schedule_id" field is required');
        }
    }
}
