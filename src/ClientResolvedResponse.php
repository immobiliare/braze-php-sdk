<?php

namespace ImmobiliareLabs\BrazeSDK;

class ClientResolvedResponse
{
    /** @var int */
    private $statusCode;

    /** @var string */
    private $body;

    public function __construct(int $statusCode, string $body)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
