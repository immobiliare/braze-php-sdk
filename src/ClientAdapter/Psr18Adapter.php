<?php

namespace ImmobiliareLabs\BrazeSDK\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientResolvedResponse;
use ImmobiliareLabs\BrazeSDK\Exception\ClientException;
use ImmobiliareLabs\BrazeSDK\Exception\NotValidBaseURIException;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

class Psr18Adapter implements ClientAdapterInterface
{
    private ClientInterface $client;

    private UriFactoryInterface $uriFactory;

    private RequestFactoryInterface $requestFactory;

    private StreamFactoryInterface $streamFactory;

    private array $headers = [];

    private ?UriInterface $baseURI = null;

    private ?float $connectionTimeout = null;
    private ?float $overallTimeout = null;

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
        } catch (NetworkExceptionInterface $networkException) {
            throw new TransportException($networkException->getMessage(), 0, $networkException);
        } catch (ClientExceptionInterface $clientException) {
            throw new ClientException($clientException->getMessage(), 0, $clientException);
        }
    }

    /**
     * @param ResponseInterface $httpResponse
     */
    public function resolveResponse($httpResponse): ClientResolvedResponse
    {
        return new ClientResolvedResponse(
            $httpResponse->getStatusCode(),
            $httpResponse->getBody(),
            $httpResponse->getHeaders()
        );
    }

    public function setConnectionTimeout(?float $connectionTimeout): void
    {
        throw new \RuntimeException('Psr18Adapter does not support timeouts');
    }

    public function setOverallTimeout(?float $overallTimeout): void
    {
        throw new \RuntimeException('Psr18Adapter does not support timeouts');
    }

    public function getConnectionTimeout(): ?float
    {
        throw new \RuntimeException('Psr18Adapter does not support timeouts');
    }

    public function getOverallTimeout(): ?float
    {
        throw new \RuntimeException('Psr18Adapter does not support timeouts');
    }
}
