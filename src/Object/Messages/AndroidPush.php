<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class AndroidPush extends BaseRequest
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
    public $notification_channel_id;

    /** @var ?int */
    public $priority;

    /** @var ?bool */
    public $send_to_sync;

    /** @var ?string */
    public $collapse_key;

    /** @var ?string */
    public $sound;

    /** @var ?string */
    public $custom_uri;

    /** @var ?string */
    public $summary_text;

    /** @var ?int */
    public $time_to_live;

    /** @var ?int */
    public $notification_id;

    /** @var ?string */
    public $push_icon_image_url;

    /** @var ?int */
    public $accent_color;

    /** @var ?bool */
    public $send_to_most_recent_device_only;

    /** @var ?AndroidPushActionButton[] */
    public $buttons;

    /** @var ?AndroidConversationPush */
    public $conversation_data;

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
