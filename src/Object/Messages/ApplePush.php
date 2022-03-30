<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ApplePush extends BaseRequest
{
    public ?int $badge = null;

    /** @var ?string|ApplePushAlert */
    public string|null|ApplePushAlert $alert = null;

    public ?string $sound = null;

    public ?array $extra = null;

    public ?bool $content_available = null;

    public ?string $interruption_level = null;

    public ?float $relevance_score = null;

    public ?DateTimeInterface $expiry = null;

    public ?string $custom_uri = null;

    public ?string $message_variation_id = null;

    public ?string $notification_group_thread_id = null;

    public ?string $asset_url = null;

    public ?string $asset_file_type = null;

    public ?string $collapse_id = null;

    public ?bool $mutable_content = null;

    public ?bool $send_to_most_recent_device_only = null;

    public ?string $category = null;

    /** @var ?ApplePushActionButton[] */
    public ?array $buttons = null;

    public function jsonSerialize(): mixed
    {
        $dataToSerialize = parent::jsonSerialize();

        if (isset($dataToSerialize['content_available'])) {
            $dataToSerialize['content-available'] = $dataToSerialize['content_available'];
            unset($dataToSerialize['content_available']);
        }

        return $dataToSerialize;
    }
}
