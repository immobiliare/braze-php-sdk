<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class SendRequest extends BaseRequest
{
    public bool $broadcast = false;

    public ?array $external_user_ids = null;

    /** @var ?UserAlias[] */
    public ?array $user_aliases = null;

    public ?string $segment_id = null;

    public ?array $audience = null;

    public ?string $campaign_id = null;

    public ?string $send_id = null;

    public ?bool $override_frequency_capping = null;

    public ?string $recipient_subscription_state = null;

    public ?Messages $messages = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->segment_id && null === $this->external_user_ids && null === $this->audience) {
            throw new ValidationException('One of "segment_id", "external_user_ids" or "audience" fields is required');
        }
    }
}
