<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class WebPush extends BaseRequest
{
    /** @var ?string */
    public $alert;

    /** @var ?string */
    public $title;

    /** @var ?array */
    public $extra;

    /** @var ?string */
    public $message_variation_id;

    /** @var ?string */
    public $custom_uri;

    /** @var ?string */
    public $image_url;

    /** @var ?string */
    public $large_image_url;

    /** @var ?bool */
    public $require_interaction;

    /** @var ?int */
    public $time_to_live;

    /** @var ?bool */
    public $send_to_most_recent_device_only;

    /** @var ?WebPushActionButton[] */
    public $buttons;

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
