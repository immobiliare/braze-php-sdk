<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

/**
 * @see https://www.braze.com/docs/api/objects_filters/messaging/email_object/
 */
class Email extends BaseObject
{
    public ?string $app_id = null;

    public ?string $subject = null;

    public ?string $from = null; // Display Name <email@address.com>

    public ?string $bcc = null;

    public ?string $body = null;

    public ?string $plaintext_body = null;

    public ?string $preheader = null;

    public ?string $email_template_id = null;

    public ?string $message_variation_id = null;

    public ?array $extras = null;

    public ?array $headers = null;

    public ?bool $should_inline_css = null;

    /** @var ?EmailAttachment[] */
    public ?array $attachments = null;

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
