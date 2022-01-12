<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Events;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AnalyticsRequest extends BaseRequest
{
    /** @var ?string */
    public $event;

    /** @var ?int */
    public $length;

    /** @var ?string */
    public $unit;

    /** @var ?DateTimeInterface */
    public $ending_at;

    /** @var ?string */
    public $app_id;

    /** @var ?string */
    public $segment_id;

    public function validate(bool $strict): void
    {
        if (null === $this->event) {
            throw new ValidationException('The "event" field is required');
        }

        if (null === $this->length) {
            throw new ValidationException('The "length" field is required');
        }
    }
}
