<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Sessions\AnalyticsRequest;

class SessionsTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->sessions()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['analytics', AnalyticsRequest::class]
        ];
    }
}
