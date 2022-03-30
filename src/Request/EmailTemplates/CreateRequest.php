<?php

namespace ImmobiliareLabs\BrazeSDK\Request\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateRequest extends BaseRequest
{
    public ?string $template_name = null;

    public ?string $subject = null;

    public ?string $body = null;

    public ?string $plaintext_body = null;

    public ?string $preheader = null;

    public ?array $tags = null;

    public ?bool $should_inline_css = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->template_name) {
            throw new ValidationException('The "template_name" field is required');
        }

        if (null === $this->subject) {
            throw new ValidationException('The "subject" field is required');
        }

        if (null === $this->body) {
            throw new ValidationException('The "body" field is required');
        }
    }
}
