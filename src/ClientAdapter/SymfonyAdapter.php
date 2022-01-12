<?php

namespace ImmobiliareLabs\BrazeSDK\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientResolvedResponse;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class SymfonyAdapter implements ClientAdapterInterface
{
    /** @var HttpClientInterface */
    private $client;

    /** @var array */
    private $headers = [];

    /** @var ?string */
    private $baseURI;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function setBaseURI(string $baseURI): void
    {
        $this->baseURI = $baseURI;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @throws TransportException
     */
    public function makeRequest(string $method, string $path, ?string $body = null): ResponseInterface
    {
        $options = [
            'base_uri' => $this->baseURI,
            'headers' => $this->headers,
            'body' => $body,
        ];

        try {
            return $this->client->request($method, $path, $options);
        } catch (TransportExceptionInterface $e) {
            throw new TransportException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @param ResponseInterface $httpResponse
     * @throws TransportException
     */
    public function resolveResponse($httpResponse): ClientResolvedResponse
    {
        try {
            return new ClientResolvedResponse($httpResponse->getStatusCode(), $httpResponse->getContent(false));
        } catch (TransportExceptionInterface|ClientExceptionInterface|ServerExceptionInterface|RedirectionExceptionInterface $e) {
            // ClientExceptionInterface, ServerExceptionInterface and RedirectionExceptionInterface never occurs because throw parameter is set to false
            throw new TransportException($e->getMessage(), 0, $e);
        }
    }
}
