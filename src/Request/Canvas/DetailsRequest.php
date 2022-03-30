<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class DetailsRequest extends BaseRequest
{
    public ?string $canvas_id = null;

    public function validate(bool $strict): void
    {
        if (null === $this->canvas_id) {
            throw new ValidationException('The "canvas_id" field is required');
        }
    }
}
