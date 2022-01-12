<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Subscription\GetStatusRequest;
use PHPUnit\Framework\TestCase;

class GetStatusRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(GetStatusRequest $getStatusRequest): void
    {
        $getStatusRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSubscriptionGroupId(GetStatusRequest $getStatusRequest): void
    {
        $this->expectException(ValidationException::class);

        $getStatusRequest->subscription_group_id = null;

        $getStatusRequest->validate(true);
    }

    public function validProvider(): array
    {
        $getStatusRequest1 = new GetStatusRequest();

        $getStatusRequest1->subscription_group_id = 'subscription_group_id';

        return [
            [$getStatusRequest1]
        ];
    }
}
