<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Kpi;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DailyUninstallsRequest extends BaseRequest
{
    /** @var ?int */
    public $length;

    /** @var ?DateTimeInterface */
    public $ending_at;

    /** @var ?string */
    public $app_id;

    public function validate(bool $strict): void
    {
        if (null === $this->length) {
            throw new ValidationException('The "length" field is required');
        }
    }
}
