<?php

namespace ImmobiliareLabs\BrazeSDK\Response\ContentBlocks;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class CreateResponse extends BaseResponse
{
    /** @var ?string */
    public $content_block_id;

    /** @var ?string */
    public $liquid_tag;

    /** @var ?DateTimeImmutable */
    public $created_at;

    /**
     * @throws Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }
    }
}
