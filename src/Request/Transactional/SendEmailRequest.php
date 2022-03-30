<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Transactional;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class SendEmailRequest extends BaseRequest
{
    public ?string $campaign_id = null;

    public ?string $external_send_id = null;

    public ?array $trigger_properties = null;

    /** @var ?Recipient[] */
    public ?array $recipients = null;

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
