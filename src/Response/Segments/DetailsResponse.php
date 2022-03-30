<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Segments;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    public ?DateTimeInterface $created_at = null;

    public ?DateTimeInterface $updated_at = null;

    public ?string $name = null;

    public ?string $description = null;

    public ?string $text_description = null;

    public ?array $tags = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->tags = $params['tags'] ?? [];
    }
}
