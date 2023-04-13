<?php

namespace ImmobiliareLabs\BrazeSDK;

use ImmobiliareLabs\BrazeSDK\ClientAdapter\ClientAdapterInterface;
use ImmobiliareLabs\BrazeSDK\Exception\NotValidResponseException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class Client
{
    private ClientAdapterInterface $adapter;

    private array $responsesToResolve = [];

    public function __construct(ClientAdapterInterface $adapter, string $apiKey, Region $instance)
    {
        $this->adapter = $adapter;

        $this->adapter->setBaseURI($instance->getRestEndpoint());
        $this->adapter->setHeaders($this->buildHeaders($apiKey));
    }

    private function buildHeaders(string $apiKey): array
    {
        return [
            'Authorization' => sprintf('Bearer %s', $apiKey),
            'Content-Type' => 'application/json',
        ];
    }

    public function makeRequest(string $method, string $path, BaseRequest $request)
    {
        if ('GET' === strtoupper($method)) {
            $queryParts = $request->jsonSerialize();
            $queryString = http_build_query($queryParts);

            if (!empty($queryString)) {
                $path = sprintf('%s?%s', $path, $queryString);
            }

            $body = null;
        } else {
            $body = json_encode($request);
        }

        return $this->adapter->makeRequest($method, $path, $body);
    }

    public function resolveOrRegisterResponse($httpResponse, BaseResponse $libResponse, bool $resolveResponse): void
    {
        if ($resolveResponse) {
            $this->resolveResponse($httpResponse, $libResponse);
        } else {
            $this->responsesToResolve[] = ['httpResponse' => $httpResponse, 'libResponse' => $libResponse];
        }
    }

    private function resolveResponse($httpResponse, BaseResponse $libResponse): void
    {
        if (null === $httpResponse) {
            return;
        }

        $resolvedResponse = $this->adapter->resolveResponse($httpResponse);

        $body = json_decode($resolvedResponse->getBody(), true);

        if (null === $body) {
            throw new NotValidResponseException(sprintf('Response body cannot be decoded as json. Original content: %s', $resolvedResponse->getBody()));
        }

        $libResponse->setIsSuccess($this->isSuccess($resolvedResponse->getStatusCode(), $body));
        $libResponse->setHttpStatusCode($resolvedResponse->getStatusCode());
        $libResponse->setFatalError($libResponse->isSuccess() ? null : ($body['message'] ?? 'Unknown error'));
        $libResponse->setMinorErrors($body['errors'] ?? []);

        $libResponse->fillFromArray($body);
    }

    private function isSuccess(int $statusCode, array $body): bool
    {
        if (200 > $statusCode || 300 <= $statusCode) {
            return false;
        }

        if (!array_key_exists('message', $body)) {
            return false;
        }

        if (!in_array($body['message'], ['success', 'queued'])) {
            return false;
        }

        return true;
    }

    public function flush(): int
    {
        $resolvedResponseCount = 0;
        foreach ($this->responsesToResolve as $responseToResolve) {
            $this->resolveResponse($responseToResolve['httpResponse'], $responseToResolve['libResponse']);
            $resolvedResponseCount++;
        }

        $this->responsesToResolve = [];

        return $resolvedResponseCount;
    }
}
