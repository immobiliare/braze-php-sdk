<?php

namespace ImmobiliareLabs\BrazeSDK\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientResolvedResponse;
use ImmobiliareLabs\BrazeSDK\Exception\ClientException;
use ImmobiliareLabs\BrazeSDK\Exception\ServerException;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

/**
 * @template THttpResponse of mixed
 */
interface ClientAdapterInterface
{
    public function setBaseURI(string $baseURI): void;

    public function setHeaders(array $headers): void;

    /**
     * If the http client supports asynchronous calls this method should just place the call in a non-blocking way.
     *
     * @return THttpResponse the real response or a reference to it that will allow you to solve it later, for example a promise
     *
     * @throws TransportException
     * @throws ServerException
     * @throws ClientException
     */
    public function makeRequest(string $method, string $path, ?string $body = null): mixed;

    /**
     * @param THttpResponse $httpResponse the real response or a reference to it. It's the value returned by the makeRequest method
     *
     * @throws TransportException
     * @throws ServerException
     * @throws ClientException
     */
    public function resolveResponse(mixed $httpResponse): ClientResolvedResponse;

    public function setConnectionTimeout(?float $connectionTimeout): void;

    public function setOverallTimeout(?float $overallTimeout): void;

    public function getConnectionTimeout(): ?float;

    public function getOverallTimeout(): ?float;
}
