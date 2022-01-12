<?php

namespace ImmobiliareLabs\BrazeSDK\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientResolvedResponse;
use ImmobiliareLabs\BrazeSDK\Exception\NotValidBaseURIException;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

class Psr18Adapter implements ClientAdapterInterface
{
    /** @var ClientInterface */
    private $client;

    /** @var UriFactoryInterface */
    private $uriFactory;

    /** @var RequestFactoryInterface */
    private $requestFactory;

    /** @var StreamFactoryInterface */
    private $streamFactory;

    /** @var array */
    private $headers = [];

    /** @var ?string */
    private $baseURI;

    public function __construct(ClientInterface $client, UriFactoryInterface $uriFactory, RequestFactoryInterface $requestFactory, StreamFactoryInterface $streamFactory)
    {
        $this->client = $client;

        $this->uriFactory = $uriFactory;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
    }

    public function setBaseURI(string $baseURI): void
    {
        $this->baseURI = $this->buildBaseURI($baseURI);
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    private function buildBaseURI(string $baseURI): UriInterface
    {
        if (!preg_match('/^(https?):\/\/(.*)$/', $baseURI, $matches)) {
            throw new NotValidBaseURIException(sprintf('%s is not a valid base URI', $baseURI));
        }

        return $this->uriFactory->createUri()
            ->withScheme($matches[1])
            ->withHost($matches[2]);
    }

    /**
     * @throws TransportException
     */
    public function makeRequest(string $method, string $path, ?string $body = null): ResponseInterface
    {
        $uri = $this->baseURI->withPath($path);

        $request = $this->requestFactory->createRequest($method, $uri);

        foreach ($this->headers as $headerName => $headerValue) {
            $request = $request->withHeader($headerName, $headerValue);
        }

        if (null !== $body) {
            $request = $request->withBody($this->streamFactory->createStream($body));
        }

        try {
            return $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            // is this correct?
            throw new TransportException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @param ResponseInterface $httpResponse
     */
    public function resolveResponse($httpResponse): ClientResolvedResponse
    {
        return new ClientResolvedResponse($httpResponse->getStatusCode(), $httpResponse->getBody());
    }
}
