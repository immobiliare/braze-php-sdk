<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ExportByGlobalControlGroupRequest extends BaseRequest
{
    /** @var ?string */
    public $callback_endpoint;

    /** @var ?string[] */
    public $fields_to_export;

    /** @var ?string */
    public $output_format;

    public function validate(bool $strict): void
    {
        if (null === $this->fields_to_export) {
            throw new ValidationException('The "fields_to_export" field is required');
        }
    }
}
