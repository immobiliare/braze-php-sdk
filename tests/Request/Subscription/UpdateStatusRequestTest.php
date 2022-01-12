<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Subscription\UpdateStatusRequest;
use PHPUnit\Framework\TestCase;

class UpdateStatusRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(UpdateStatusRequest $updateStatusRequest): void
    {
        $updateStatusRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSubscriptionGroupId(UpdateStatusRequest $updateStatusRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateStatusRequest->subscription_group_id = null;

        $updateStatusRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSubscriptionState(UpdateStatusRequest $updateStatusRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateStatusRequest->subscription_state = null;

        $updateStatusRequest->validate(true);
    }

    public function validProvider(): array
    {
        $updateStatusRequest1 = new UpdateStatusRequest();

        $updateStatusRequest1->subscription_group_id = 'subscription_group_id';
        $updateStatusRequest1->subscription_state = 'subscription_state';

        return [
            [$updateStatusRequest1]
        ];
    }
}
