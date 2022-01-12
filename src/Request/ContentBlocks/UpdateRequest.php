<?php

namespace ImmobiliareLabs\BrazeSDK\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

class UpdateRequest extends CreateRequest
{
    /** @var ?string */
    public $content_block_id;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->content_block_id) {
            throw new ValidationException('The "content_block_id" field is required');
        }
    }
}
