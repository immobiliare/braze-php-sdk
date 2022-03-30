<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class WebPush extends BaseRequest
{
    public ?string $alert = null;

    public ?string $title = null;

    public ?array $extra = null;

    public ?string $message_variation_id = null;

    public ?string $custom_uri = null;

    public ?string $image_url = null;

    public ?string $large_image_url = null;

    public ?bool $require_interaction = null;

    public ?int $time_to_live = null;

    public ?bool $send_to_most_recent_device_only = null;

    /** @var ?WebPushActionButton[] */
    public ?array $buttons = null;

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
