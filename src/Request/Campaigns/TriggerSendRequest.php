<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;
use ImmobiliareLabs\BrazeSDK\Request\HasRecipients;

class TriggerSendRequest extends BaseRequest
{
    /** @var ?string */
    public $campaign_id;

    /** @var ?string */
    public $send_id;

    /** @var ?array */
    public $trigger_properties;

    /** @var bool */
    public $broadcast = false;

    /** @var ?array */
    public $audience;

    /** @var ?Recipient[] */
    public $recipients;

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
