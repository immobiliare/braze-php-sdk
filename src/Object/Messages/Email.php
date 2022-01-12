<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

/**
 * @see https://www.braze.com/docs/api/objects_filters/messaging/email_object/
 */
class Email extends BaseObject
{
    /** @var ?string */
    public $app_id;

    /** @var ?string */
    public $subject;

    /** @var ?string */
    public $from; // Display Name <email@address.com>

    /** @var ?string */
    public $bcc;

    /** @var ?string */
    public $body;

    /** @var ?string */
    public $plaintext_body;

    /** @var ?string */
    public $preheader;

    /** @var ?string */
    public $email_template_id;

    /** @var ?string */
    public $message_variation_id;

    /** @var ?array */
    public $extras;

    /** @var ?array */
    public $headers;

    /** @var ?bool */
    public $should_inline_css;

    /** @var ?EmailAttachment[] */
    public $attachments;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->app_id) {
            throw new ValidationException('The "app_id" field is required');
        }

        if (null === $this->from) {
            throw new ValidationException('The "from" field is required');
        }

        if (null === $this->body && null === $this->email_template_id) {
            throw new ValidationException('One of "body" or "email_template_id" fields is required');
        }
    }
}
