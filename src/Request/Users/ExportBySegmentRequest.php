<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ExportBySegmentRequest extends BaseRequest
{
    /** @var ?string */
    public $segment_id;

    /** @var ?string */
    public $callback_endpoint;

    /** @var ?string[] */
    public $fields_to_export;

    /** @var ?string */
    public $output_format;

    public function validate(bool $strict): void
    {
        if (null === $this->segment_id) {
            throw new ValidationException('The "segment_id" field is required');
        }

        if (null === $this->fields_to_export) {
            throw new ValidationException('The "fields_to_export" field is required');
        }
    }
}
