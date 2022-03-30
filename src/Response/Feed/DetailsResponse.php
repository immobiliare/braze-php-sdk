<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Feed;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    public ?DateTimeInterface $created_at = null;

    public ?DateTimeInterface $updated_at = null;

    public ?string $name = null;

    public ?DateTimeInterface $publish_at = null;

    public ?DateTimeInterface $end_at = null;

    public ?array $tags = null;

    public ?string $title = null;

    public ?string $image_url = null;

    public ?array $extras = null;

    public ?string $description = null;

    public ?bool $archived = null;

    public ?bool $draft = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->tags = $params['tags'] ?? [];

        $this->extras = $params['extras'] ?? [];
    }
}
