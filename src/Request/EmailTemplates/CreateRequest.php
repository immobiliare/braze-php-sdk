<?php

namespace ImmobiliareLabs\BrazeSDK\Request\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateRequest extends BaseRequest
{
    /** @var ?string */
    public $template_name;

    /** @var ?string */
    public $subject;

    /** @var ?string */
    public $body;

    /** @var ?string */
    public $plaintext_body;

    /** @var ?string */
    public $preheader;

    /** @var ?array */
    public $tags;

    /** @var ?bool */
    public $should_inline_css;

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
