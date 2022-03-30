<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateScheduleRequest extends BaseRequest
{
    public ?string $canvas_id = null;

    /** @var ?Recipient[] */
    public ?array $recipients = null;

    public ?array $audience = null;

    public ?bool $broadcast = null;

    public ?array $canvas_entry_properties = null;

    public ?Schedule $schedule = null;

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
