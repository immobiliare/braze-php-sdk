<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class SendRequest extends BaseRequest
{
    /** @var bool */
    public $broadcast = false;

    /** @var ?array */
    public $external_user_ids;

    /** @var ?UserAlias[] */
    public $user_aliases;

    /** @var ?string */
    public $segment_id;

    /** @var ?array */
    public $audience;

    /** @var ?string */
    public $campaign_id;

    /** @var ?string */
    public $send_id;

    /** @var ?bool */
    public $override_frequency_capping;

    /** @var ?string */
    public $recipient_subscription_state;

    /** @var ?Messages */
    public $messages;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->segment_id && null === $this->external_user_ids && null === $this->audience) {
            throw new ValidationException('One of "segment_id", "external_user_ids" or "audience" fields is required');
        }
    }
}
