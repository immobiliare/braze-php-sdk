<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateScheduleRequest extends BaseRequest
{
    public ?string $campaign_id = null;

    public ?string $send_id = null;

    /** @var ?Recipient[] */
    public ?array $recipients = null;

    public ?array $audience = null;

    public ?bool $broadcast = null;

    public ?array $trigger_properties = null;

    public ?Schedule $schedule = null;

    public function validate(bool $strict): void
    {
        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }

        if (null === $this->schedule) {
            throw new ValidationException('The "schedule" field is required');
        }
    }
}
