<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\Client;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

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

    protected function makeRequest(string $method, string $path, BaseRequest $request, string $responseClass, bool $resolveResponse)
    {
        if ($this->braze->getValidation()) {
            $request->validate($this->braze->getStrictValidation());
        }

        $response = new $responseClass();

        $httpResponse = $this->braze->getDryRun() ? null : $this->client->makeRequest($method, $path, $request);

        $this->client->resolveOrRegisterResponse($httpResponse, $response, $resolveResponse);

        return $response;
    }
}
