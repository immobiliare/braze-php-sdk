<?php

namespace ImmobiliareLabs\BrazeSDK\Response\ContentBlocks;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class InfoResponse extends BaseResponse
{
    /** @var ?string */
    public $content_block_id;

    /** @var ?string */
    public $name;

    /** @var ?string */
    public $content;

    /** @var ?string */
    public $description;

    /** @var ?string */
    public $content_type;

    /** @var ?array */
    public $tags;

    /** @var ?DateTimeImmutable */
    public $created_at;

    /** @var ?DateTimeImmutable */
    public $last_edited;

    /** @var ?int */
    public $inclusion_count;

    /** @var ?array */
    public $inclusion_data;

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
