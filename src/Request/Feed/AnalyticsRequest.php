<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Feed;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AnalyticsRequest extends BaseRequest
{
    /** @var ?string */
    public $card_id;

    /** @var ?int */
    public $length;

    /** @var ?string */
    public $unit;

    /** @var ?DateTimeInterface */
    public $ending_at;

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
