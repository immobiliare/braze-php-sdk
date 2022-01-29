<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Events;

class EventsTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->events()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['analytics', Events\AnalyticsRequest::class],
            ['list', Events\ListRequest::class],
        ];
    }
}
