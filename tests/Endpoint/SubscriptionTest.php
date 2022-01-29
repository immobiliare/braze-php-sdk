<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Subscription;

class SubscriptionTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->subscription()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['getStatus', Subscription\GetStatusRequest::class],
            ['listUserGroups', Subscription\ListUserGroupsRequest::class],
            ['updateStatus', Subscription\UpdateStatusRequest::class],
        ];
    }
}
