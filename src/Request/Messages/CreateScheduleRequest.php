<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateScheduleRequest extends BaseRequest
{
    public ?bool $broadcast = null;

    /** @var ?string[] */
    public ?array $external_user_ids = null;

    /** @var ?UserAlias[] */
    public ?array $user_aliases = null;

    public ?array $audience = null;

    public ?string $segment_id = null;

    public ?string $campaign_id = null;

    public ?string $send_id = null;

    public ?bool $override_messaging_limits = null;

    public ?string $recipient_subscription_state = null;

    public ?Schedule $schedule = null;

    public ?Messages $messages = null;

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
