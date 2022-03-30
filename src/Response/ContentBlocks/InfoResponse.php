<?php

namespace ImmobiliareLabs\BrazeSDK\Response\ContentBlocks;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class InfoResponse extends BaseResponse
{
    public ?string $content_block_id = null;

    public ?string $name = null;

    public ?string $content = null;

    public ?string $description = null;

    public ?string $content_type = null;

    public ?array $tags = null;

    public ?DateTimeImmutable $created_at = null;

    public ?DateTimeImmutable $last_edited = null;

    public ?int $inclusion_count = null;

    public ?array $inclusion_data = null;

    /**
     * @throws Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        if (isset($params['last_edited']) && is_string($params['last_edited'])) {
            $this->last_edited = new DateTimeImmutable($params['last_edited']);
        }

        if (isset($params['tags']) && is_array($params['tags'])) {
            $this->tags = $params['tags'];
        }

        if (isset($params['inclusion_data']) && is_array($params['inclusion_data'])) {
            $this->inclusion_data = $params['inclusion_data'];
        }

        parent::fillFromArray($params, $allowExtraProperties);
    }
}
