<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DeleteScheduleRequest extends BaseRequest
{
    public ?string $campaign_id = null;

    public ?string $schedule_id = null;

    public function validate(bool $strict): void
    {
        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }

        if (null === $this->schedule_id) {
            throw new ValidationException('The "schedule_id" field is required');
        }
    }
}
