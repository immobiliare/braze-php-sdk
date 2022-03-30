<?php

namespace ImmobiliareLabs\BrazeSDK\Object\ContentBlocks;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class ListItem extends BaseObject
{
    public ?string $content_block_id = null;

    public ?string $name = null;

    public ?string $content_type = null;

    public ?string $liquid_tag = null;

    public ?int $inclusion_count = null;

    public ?DateTimeImmutable $created_at = null;

    public ?DateTimeImmutable $last_edited = null;

    public ?array $tags = null;

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

        parent::fillFromArray($params, $allowExtraProperties);
    }
}
