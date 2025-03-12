<?php

namespace ImmobiliareLabs\BrazeSDK;

class ClientResolvedResponse
{
    private int $statusCode;

    private string $body;

    private array $headers;

    public function __construct(int $statusCode, string $body, array $headers)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
        $this->headers = $headers;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}
