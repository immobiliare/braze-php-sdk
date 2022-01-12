<?php

namespace ImmobiliareLabs\BrazeSDK\Request\ContentBlocks;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class InfoRequest extends BaseRequest
{
    /** @var ?string */
    public $content_block_id;

    /** @var ?bool */
    public $include_inclusion_data;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->content_block_id) {
            throw new ValidationException('The "content_block_id" field is required');
        }
    }
}
