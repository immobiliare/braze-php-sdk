<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class SummaryRequest extends BaseRequest
{
    public ?string $canvas_id = null;

    public ?DateTimeInterface $ending_at = null;

    public ?DateTimeInterface $starting_at = null;

    public ?int $length = null;

    public ?bool $include_variant_breakdown = null;

    public ?bool $include_step_breakdown = null;

    public ?bool $include_deleted_step_data = null;

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
