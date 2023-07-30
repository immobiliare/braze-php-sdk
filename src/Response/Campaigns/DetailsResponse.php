<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Campaigns;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    public ?DateTimeInterface $created_at = null;

    public ?DateTimeInterface $updated_at = null;

    public ?bool $archived = null;

    public ?bool $draft = null;

    public ?string $name = null;

    public ?string $description = null;

    public ?string $schedule_type = null;

    public ?array $channels = null;

    public ?DateTimeInterface $first_sent = null;

    public ?DateTimeInterface $last_sent = null;

    /** @var ?string[] */
    public ?array $tags = null;

    public ?array $messages = null;

    public ?array $conversion_behaviors = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->channels = $params['channels'] ?? [];

        $this->tags = $params['tags'] ?? [];

        $this->messages = $params['messages'] ?? [];

        $this->conversion_behaviors = $params['conversion_behaviors'] ?? [];
    }
}
