<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ExportByGlobalControlGroupRequest extends BaseRequest
{
    public ?string $callback_endpoint = null;

    /** @var ?string[] */
    public ?array $fields_to_export = null;

    public ?string $output_format = null;

    public function validate(bool $strict): void
    {
        if (null === $this->fields_to_export) {
            throw new ValidationException('The "fields_to_export" field is required');
        }
    }
}
