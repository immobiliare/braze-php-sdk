<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AndroidPush extends BaseRequest
{
    public ?string $alert = null;

    public ?string $title = null;

    public ?array $extra = null;

    public ?string $message_variation_id = null;

    public ?string $notification_channel_id = null;

    public ?int $priority = null;

    public ?bool $send_to_sync = null;

    public ?string $collapse_key = null;

    public ?string $sound = null;

    public ?string $custom_uri = null;

    public ?string $summary_text = null;

    public ?int $time_to_live = null;

    public ?int $notification_id = null;

    public ?string $push_icon_image_url = null;

    public ?int $accent_color = null;

    public ?bool $send_to_most_recent_device_only = null;

    /** @var ?AndroidPushActionButton[] */
    public ?array $buttons = null;

    public ?AndroidConversationPush $conversation_data = null;

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
