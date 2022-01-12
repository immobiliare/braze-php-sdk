<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DetailsRequest extends BaseRequest
{
    /** @var ?string */
    public $campaign_id;

    public function validate(bool $strict): void
    {
        if (null === $this->campaign_id) {
            throw new ValidationException('The "campaign_id" field is required');
        }
    }
}
