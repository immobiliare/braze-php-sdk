<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;
use ImmobiliareLabs\BrazeSDK\Request\HasRecipients;

class TriggerSendRequest extends BaseRequest
{
    public ?string $campaign_id = null;

    public ?string $send_id = null;

    public ?array $trigger_properties = null;

    public bool $broadcast = false;

    public ?array $audience = null;

    /** @var ?Recipient[] */
    public ?array $recipients = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }

        if (false === $this->broadcast && !$this->hasRecipients()) {
            throw new ValidationException('The "broadcast" field must be set to true if "recipients" is omitted');
        }
    }

    use HasRecipients;
}
