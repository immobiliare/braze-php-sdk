<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Kpi;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DailyUninstallsRequest extends BaseRequest
{
    public ?int $length = null;

    public ?DateTimeInterface $ending_at = null;

    public ?string $app_id = null;

    public function validate(bool $strict): void
    {
        if (null === $this->length) {
            throw new ValidationException('The "length" field is required');
        }
    }
}
