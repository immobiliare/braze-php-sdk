<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ApplePush extends BaseRequest
{
    /** @var ?int */
    public $badge;

    /** @var ?string|ApplePushAlert */
    public $alert;

    /** @var ?string */
    public $sound;

    /** @var ?array */
    public $extra;

    /** @var ?bool */
    public $content_available;

    /** @var ?string */
    public $interruption_level;

    /** @var ?float */
    public $relevance_score;

    /** @var ?DateTimeInterface */
    public $expiry;

    /** @var ?string */
    public $custom_uri;

    /** @var ?string */
    public $message_variation_id;

    /** @var ?string */
    public $notification_group_thread_id;

    /** @var ?string */
    public $asset_url;

    /** @var ?string */
    public $asset_file_type;

    /** @var ?string */
    public $collapse_id;

    /** @var ?bool */
    public $mutable_content;

    /** @var ?bool */
    public $send_to_most_recent_device_only;

    /** @var ?string */
    public $category;

    /** @var ?ApplePushActionButton[] */
    public $buttons;
}
