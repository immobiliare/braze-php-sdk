<?php

namespace ImmobiliareLabs\BrazeSDK\Request\EmailTemplates;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class InfoRequest extends BaseRequest
{
    /** @var ?string */
    public $email_template_id;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->email_template_id) {
            throw new ValidationException('The "email_template_id" field is required');
        }
    }
}
