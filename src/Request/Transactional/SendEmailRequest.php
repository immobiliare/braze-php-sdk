<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Transactional;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class SendEmailRequest extends BaseRequest
{
    /** @var ?string */
    public $campaign_id;

    /** @var ?string */
    public $external_send_id;

    /** @var ?array */
    public $trigger_properties;

    /** @var ?Recipient[] */
    public $recipients;

    public function validate(bool $strict): void
    {
        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }

        if (null === $this->recipients) {
            throw new ValidationException('The "recipients" field is required');
        }
    }
}
