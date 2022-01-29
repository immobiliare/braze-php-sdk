<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Feed;

class FeedTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->feed()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['analytics', Feed\AnalyticsRequest::class],
            ['details', Feed\DetailsRequest::class],
            ['list', Feed\ListRequest::class],
        ];
    }
}
