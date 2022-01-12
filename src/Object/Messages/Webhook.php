<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class Webhook extends BaseRequest
{
    /** @var ?string */
    public $url;

    /** @var ?string */
    public $request_method;

    /** @var ?array */
    public $request_headers;

    /** @var ?string */
    public $body;

    /** @var ?string */
    public $message_variation_id;

    public function validate(bool $strict): void
    {
        if (null === $this->url) {
            throw new ValidationException('The "url" field is required');
        }

        if (null === $this->request_method) {
            throw new ValidationException('The "request_method" field is required');
        }
    }
}
