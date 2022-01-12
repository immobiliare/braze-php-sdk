<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AnalyticsRequest extends BaseRequest
{
    /** @var ?string */
    public $campaign_id;

    /** @var ?int */
    public $length;

    /** @var ?DateTimeInterface */
    public $ending_at;

    public function validate(bool $strict): void
    {
        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }

        if (null === $this->length) {
            throw new ValidationException('The "length" field is required');
        }
    }
}
