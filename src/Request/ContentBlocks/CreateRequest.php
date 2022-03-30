<?php

namespace ImmobiliareLabs\BrazeSDK\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateRequest extends BaseRequest
{
    public ?string $name = null;

    public ?string $description = null;

    public ?string $content = null;

    public ?string $state = null;

    public ?array $tags = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->name) {
            throw new ValidationException('The "name" field is required');
        }

        if (null === $this->content) {
            throw new ValidationException('The "content" field is required');
        }
    }
}
