<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateScheduleRequest extends BaseRequest
{
    /** @var ?string */
    public $canvas_id;

    /** @var ?Recipient[] */
    public $recipients;

    /** @var ?array */
    public $audience;

    /** @var ?bool */
    public $broadcast;

    /** @var ?array */
    public $canvas_entry_properties;

    /** @var ?Schedule */
    public $schedule;

    public function validate(bool $strict): void
    {
        if (null === $this->canvas_id) {
            throw new ValidationException('The "canvas_id" field is required');
        }

        if (null === $this->schedule) {
            throw new ValidationException('The "schedule" field is required');
        }
    }
}
