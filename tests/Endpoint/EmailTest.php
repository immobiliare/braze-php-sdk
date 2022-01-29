<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Email;

class EmailTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->email()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['queryHardBounced', Email\QueryHardBouncedRequest::class],
            ['queryUnsubscribed', Email\QueryUnsubscribedRequest::class],
            ['changeSubscriptionStatus', Email\ChangeSubscriptionStatusRequest::class],
            ['removeHardBounced', Email\RemoveHardBouncedRequest::class],
            ['removeFromSpamList', Email\RemoveFromSpamListRequest::class],
            ['blacklist', Email\BlacklistRequest::class],
        ];
    }
}
