<?php

namespace ImmobiliareLabs\BrazeSDK\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientResolvedResponse;
use ImmobiliareLabs\BrazeSDK\Exception\ClientException;
use ImmobiliareLabs\BrazeSDK\Exception\ServerException;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class SymfonyAdapter implements ClientAdapterInterface
{
    private HttpClientInterface $client;

    private array $headers = [];

    private ?string $baseURI = null;

    private ?float $connectionTimeout = null;
    private ?float $overallTimeout = null;

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

    public function makeRequest(string $method, string $path, ?string $body = null): ResponseInterface
    {
        $options = [
            'base_uri' => $this->baseURI,
            'headers' => $this->headers,
            'body' => $body,
            'timeout' => $this->connectionTimeout,
            'max_duration' => $this->overallTimeout ?? 0,
        ];

        try {
            return $this->client->request($method, $path, $options);
        } catch (TransportExceptionInterface $e) {
            throw new TransportException($e->getMessage(), 0, $e);
        }
    }

    /**
     * Convert a Symfony HTTP response into a ClientResolvedResponse.
     *
     * @param ResponseInterface $httpResponse The HTTP response to convert.
     * @return ClientResolvedResponse Contains the response status code, body content (string|null), and headers (array).
     *
     * @throws TransportException If a transport-level error occurs while reading the response.
     * @throws ServerException If a server-side error (5xx) is encountered; includes response content when available.
     * @throws ClientException If a client-side or redirection error (4xx/3xx) is encountered; includes response content when available.
     */
    public function resolveResponse($httpResponse): ClientResolvedResponse
    {
        try {
            return new ClientResolvedResponse(
                $httpResponse->getStatusCode(),
                $httpResponse->getContent(),
                $httpResponse->getHeaders()
            );
        } catch (TransportExceptionInterface $e) {
            throw new TransportException($e->getMessage(), 0, $e);
        } catch (ServerExceptionInterface $serverException) {
            throw new ServerException($serverException->getMessage(), 0, $serverException, $this->safelyGetResponseContent($serverException->getResponse()));
        } catch (ClientExceptionInterface|RedirectionExceptionInterface $clientException) {
            throw new ClientException($clientException->getMessage(), 0, $clientException, $this->safelyGetResponseContent($clientException->getResponse()));
        }
    }

    /**
     * Attempt to retrieve the response body content; return null if content cannot be read.
     *
     * @param ResponseInterface $response The HTTP response to read.
     * @return string|null The response content, or `null` if an error occurred while fetching it.
     */
    private function safelyGetResponseContent(ResponseInterface $response): ?string
    {
        try {
            return $response->getContent(false);
        } catch (\Throwable $e) {
            // Ignore errors when fetching content to preserve the original exception
            return null;
        }
    }

    public function setConnectionTimeout(?float $connectionTimeout): void
    {
        $this->connectionTimeout = $connectionTimeout;
    }

    public function setOverallTimeout(?float $overallTimeout): void
    {
        $this->overallTimeout = $overallTimeout;
    }

    public function getConnectionTimeout(): ?float
    {
        return $this->connectionTimeout;
    }

    public function getOverallTimeout(): ?float
    {
        return $this->overallTimeout;
    }
}