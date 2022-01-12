<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Sends;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateRequest extends BaseRequest
{
    /** @var ?string */
    public $campaign_id;

    /** @var ?string */
    public $send_id;

    public function validate(bool $strict): void
    {
        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }
    }
}
