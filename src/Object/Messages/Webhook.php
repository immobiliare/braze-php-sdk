<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class Webhook extends BaseRequest
{
    public ?string $url = null;

    public ?string $request_method = null;

    public ?array $request_headers = null;

    public ?string $body = null;

    public ?string $message_variation_id = null;

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
