<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Segments;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DetailsRequest extends BaseRequest
{
    public ?string $segment_id = null;

    public function validate(bool $strict): void
    {
        if (null === $this->segment_id) {
            throw new ValidationException('The "segment_id" field is required');
        }
    }
}
