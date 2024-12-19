<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Feed;

use DateTimeImmutable;
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

    /**
     * @throws \Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        if (isset($params['updated_at']) && is_string($params['updated_at'])) {
            $this->updated_at = new DateTimeImmutable($params['updated_at']);
        }

        if (isset($params['publish_at']) && is_string($params['publish_at'])) {
            $this->publish_at = new DateTimeImmutable($params['publish_at']);
        }

        if (isset($params['end_at']) && is_string($params['end_at'])) {
            $this->end_at = new DateTimeImmutable($params['end_at']);
        }

        parent::fillFromArray($params);

        $this->tags = $params['tags'] ?? [];

        $this->extras = $params['extras'] ?? [];
    }
}
