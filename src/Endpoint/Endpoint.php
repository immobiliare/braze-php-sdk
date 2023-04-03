<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\Client;
use ImmobiliareLabs\BrazeSDK\Exception\ServerException;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;
use ImmobiliareLabs\BrazeSDK\RetrySettings;

abstract class Endpoint
{
    /** @var Braze */
    protected $braze;

    /** @var Client  */
    protected $client;

    public function __construct(Braze $braze)
    {
        $this->braze  = $braze;
        $this->client = $braze->getClient();
    }

    protected function makeRequest(string $method, string $path, BaseRequest $request, string $responseClass, bool $resolveResponse, ?RetrySettings $retrySettings = null)
    {
        if ($this->braze->getValidation()) {
            $request->validate($this->braze->getStrictValidation());
        }

        $response = new $responseClass();

        $retriesAllowed = null === $retrySettings ? 0 : $retrySettings->getRetriesAllowed();
        $retrySleepSeconds = null === $retrySettings ? 0 : $retrySettings->getSleepSeconds();

        $this->makeRequestInternal($method, $path, $request, $response, $resolveResponse, $retriesAllowed, $retrySleepSeconds);

        return $response;
    }

    private function makeRequestInternal(string $method, string $path, BaseRequest $request, BaseResponse $response, bool $resolveResponse, int $retriesAllowed, int $retrySleepSeconds)
    {
        try {
            $httpResponse = $this->braze->getDryRun() ? null : $this->client->makeRequest($method, $path, $request);

            $this->client->resolveOrRegisterResponse($httpResponse, $response, $resolveResponse);
        } catch (TransportException|ServerException $transportOrServerException) {
            if (0 === $retriesAllowed) {
                throw $transportOrServerException;
            }

            sleep($retrySleepSeconds);

            $this->makeRequestInternal($method, $path, $request, $response, $resolveResponse, --$retriesAllowed, $retrySleepSeconds);
        }
    }
}
