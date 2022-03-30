<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DeleteScheduleRequest extends BaseRequest
{
    public ?string $canvas_id = null;

    public ?string $schedule_id = null;

    public function validate(bool $strict): void
    {
        if (null === $this->canvas_id) {
            throw new ValidationException('The "canvas_id" field is required');
        }

        if (null === $this->schedule_id) {
            throw new ValidationException('The "schedule_id" field is required');
        }
    }
}
