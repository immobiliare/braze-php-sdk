<?php

namespace ImmobiliareLabs\BrazeSDK\Response\ContentBlocks;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class CreateResponse extends BaseResponse
{
    public ?string $content_block_id = null;

    public ?string $liquid_tag = null;

    public ?DateTimeImmutable $created_at = null;

    /**
     * @throws Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        parent::fillFromArray($params, $allowExtraProperties);
    }
}
