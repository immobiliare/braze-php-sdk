<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ContentCard extends BaseRequest
{
    public ?string $type = null;

    public ?string $title = null;

    public ?string $description = null;

    public ?string $message_variation_id = null;

    public ?bool $pinned = null;

    public ?string $image_url = null;

    public ?int $time_to_live = null;

    public ?DateTimeInterface $expiry_at = null;

    public ?bool $expire_in_local_time = null;

    public ?string $ios_uri = null;

    public ?string $android_uri = null;

    public ?string $web_uri = null;

    public ?bool $ios_use_webview = null;

    public ?bool $android_use_webview = null;

    public ?string $uri_text = null;

    public ?array $extra = null;

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
