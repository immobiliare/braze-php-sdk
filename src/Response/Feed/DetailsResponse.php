<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Feed;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    /** @var ?DateTimeInterface */
    public $created_at;

    /** @var ?DateTimeInterface */
    public $updated_at;

    /** @var ?string */
    public $name;

    /** @var ?DateTimeInterface */
    public $publish_at;

    /** @var ?DateTimeInterface */
    public $end_at;

    /** @var ?array */
    public $tags;

    /** @var ?string */
    public $title;

    /** @var ?string */
    public $image_url;

    /** @var ?array */
    public $extras;

    /** @var ?string */
    public $description;

    /** @var ?bool */
    public $archived;

    /** @var ?bool */
    public $draft;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->tags = $params['tags'] ?? [];

        $this->extras = $params['extras'] ?? [];
    }
}
