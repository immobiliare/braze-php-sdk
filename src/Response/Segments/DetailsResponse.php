<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Segments;

use DateTimeImmutable;
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

        parent::fillFromArray($params);

        $this->tags = $params['tags'] ?? [];
    }
}
