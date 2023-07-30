<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Canvas;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    public ?DateTimeInterface $created_at = null;

    public ?DateTimeInterface $updated_at = null;

    public ?string $name = null;

    public ?string $description = null;

    public ?bool $archived = null;

    public ?bool $draft = null;

    public ?string $schedule_type = null;

    public ?DateTimeInterface $first_entry = null;

    public ?DateTimeInterface $last_entry = null;

    public ?array $channels = null;

    public ?array $variants = null;

    /** @var ?string[] */
    public ?array $tags = null;

    public ?array $steps = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->channels = $params['channels'] ?? [];

        $this->variants = $params['variants'] ?? [];

        $this->tags = $params['tags'] ?? [];

        $this->steps = $params['steps'] ?? [];
    }
}
