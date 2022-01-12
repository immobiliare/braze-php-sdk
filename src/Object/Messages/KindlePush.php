<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class KindlePush extends BaseRequest
{
    /** @var ?string */
    public $alert;

    /** @var ?string */
    public $title;

    /** @var ?array */
    public $extra;

    /** @var ?string */
    public $message_variation_id;

    /** @var ?int */
    public $priority;

    /** @var ?string */
    public $collapse_key;

    /** @var ?string */
    public $sound;

    /** @var ?string */
    public $custom_uri;

    public function validate(bool $strict): void
    {
        if (null === $this->alert) {
            throw new ValidationException('The "alert" field is required');
        }

        if (null === $this->title) {
            throw new ValidationException('The "title" field is required');
        }
    }
}
