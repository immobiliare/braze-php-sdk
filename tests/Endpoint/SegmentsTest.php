<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Segments;

class SegmentsTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->segments()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['analytics', Segments\AnalyticsRequest::class],
            ['details', Segments\DetailsRequest::class],
            ['list', Segments\ListRequest::class],
        ];
    }
}
