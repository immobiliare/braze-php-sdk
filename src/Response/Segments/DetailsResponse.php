<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Segments;

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

    /** @var ?string */
    public $description;

    /** @var ?string */
    public $text_description;

    /** @var ?array */
    public $tags;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->tags = $params['tags'] ?? [];
    }
}
