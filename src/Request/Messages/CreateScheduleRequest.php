<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateScheduleRequest extends BaseRequest
{
    /** @var ?bool */
    public $broadcast;

    /** @var ?string[] */
    public $external_user_ids;

    /** @var ?UserAlias[] */
    public $user_aliases;

    /** @var ?array */
    public $audience;

    /** @var ?string */
    public $segment_id;

    /** @var ?string */
    public $campaign_id;

    /** @var ?string */
    public $send_id;

    /** @var ?bool */
    public $override_messaging_limits;

    /** @var ?string */
    public $recipient_subscription_state;

    /** @var ?Schedule */
    public $schedule;

    /** @var ?Messages */
    public $messages;

    public function validate(bool $strict): void
    {
        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }

        if (null === $this->schedule) {
            throw new ValidationException('The "schedule" field is required');
        }

        if (null === $this->messages) {
            throw new ValidationException('The "messages" field is required');
        }
    }
}
