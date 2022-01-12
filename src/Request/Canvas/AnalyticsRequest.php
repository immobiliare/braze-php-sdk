<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AnalyticsRequest extends BaseRequest
{
    /** @var ?string */
    public $canvas_id;

    /** @var ?DateTimeInterface */
    public $ending_at;

    /** @var ?DateTimeInterface */
    public $starting_at;

    /** @var ?int */
    public $length;

    /** @var ?bool */
    public $include_variant_breakdown;

    /** @var ?bool */
    public $include_step_breakdown;

    /** @var ?bool */
    public $include_deleted_step_data;

    public function validate(bool $strict): void
    {
        if (null === $this->canvas_id) {
            throw new ValidationException('The "canvas_id" field is required');
        }

        if (null === $this->ending_at) {
            throw new ValidationException('The "ending_at" field is required');
        }

        if (null === $this->length) {
            throw new ValidationException('The "length" field is required');
        }
    }
}
