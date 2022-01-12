<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ContentCard extends BaseRequest
{
    /** @var ?string */
    public $type;

    /** @var ?string */
    public $title;

    /** @var ?string */
    public $description;

    /** @var ?string */
    public $message_variation_id;

    /** @var ?bool */
    public $pinned;

    /** @var ?string */
    public $image_url;

    /** @var ?int */
    public $time_to_live;

    /** @var ?DateTimeInterface */
    public $expiry_at;

    /** @var ?bool */
    public $expire_in_local_time;

    /** @var ?string */
    public $ios_uri;

    /** @var ?string */
    public $android_uri;

    /** @var ?string */
    public $web_uri;

    /** @var ?bool */
    public $ios_use_webview;

    /** @var ?bool */
    public $android_use_webview;

    /** @var ?string */
    public $uri_text;

    /** @var ?array */
    public $extra;

    public function validate(bool $strict): void
    {
        if (null === $this->type) {
            throw new ValidationException('The "type" field is required');
        }

        if (null === $this->title) {
            throw new ValidationException('The "title" field is required');
        }

        if (null === $this->description) {
            throw new ValidationException('The "description" field is required');
        }
    }
}
