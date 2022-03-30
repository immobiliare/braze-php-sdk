<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class EmailAttachment extends BaseObject
{
    public ?string $file_name = null;

    public ?string $url = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->file_name) {
            throw new ValidationException('The "file_name" field is required');
        }

        if (null === $this->url) {
            throw new ValidationException('The "url" field is required');
        }
    }
}
