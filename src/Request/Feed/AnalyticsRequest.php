<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Feed;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AnalyticsRequest extends BaseRequest
{
    public ?string $card_id = null;

    public ?int $length = null;

    public ?string $unit = null;

    public ?DateTimeInterface $ending_at = null;

    public function validate(bool $strict): void
    {
        if (null === $this->card_id) {
            throw new ValidationException('The "card_id" field is required');
        }

        if (null === $this->length) {
            throw new ValidationException('The "length" field is required');
        }
    }
}
