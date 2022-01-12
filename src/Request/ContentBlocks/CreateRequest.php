<?php

namespace ImmobiliareLabs\BrazeSDK\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class CreateRequest extends BaseRequest
{
    /** @var ?string */
    public $name;

    /** @var ?string */
    public $description;

    /** @var ?string */
    public $content;

    /** @var ?string */
    public $state;

    /** @var ?array */
    public $tags;

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
