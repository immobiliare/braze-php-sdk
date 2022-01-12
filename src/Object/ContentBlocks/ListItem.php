<?php

namespace ImmobiliareLabs\BrazeSDK\Object\ContentBlocks;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class ListItem extends BaseObject
{
    /** @var ?string */
    public $content_block_id;

    /** @var ?string */
    public $name;

    /** @var ?string */
    public $content_type;

    /** @var ?string */
    public $liquid_tag;

    /** @var ?int */
    public $inclusion_count;

    /** @var ?DateTimeImmutable */
    public $created_at;

    /** @var ?DateTimeImmutable */
    public $last_edited;

    /** @var ?array */
    public $tags;

    /**
     * @throws Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        if (isset($params['last_edited']) && is_string($params['last_edited'])) {
            $this->last_edited = new DateTimeImmutable($params['last_edited']);
        }

        if (isset($params['tags']) && is_array($params['tags'])) {
            $this->tags = $params['tags'];
        }
    }
}
