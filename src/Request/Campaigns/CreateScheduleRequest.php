<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateScheduleRequest extends BaseRequest
{
    /** @var ?string */
    public $campaign_id;

    /** @var ?string */
    public $send_id;

    /** @var ?Recipient[] */
    public $recipients;

    /** @var ?array */
    public $audience;

    /** @var ?bool */
    public $broadcast;

    /** @var ?array */
    public $trigger_properties;

    /** @var ?Schedule */
    public $schedule;

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
