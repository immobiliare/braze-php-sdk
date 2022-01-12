<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Email;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Email\ChangeSubscriptionStatusRequest;
use PHPUnit\Framework\TestCase;

class ChangeSubscriptionStatusRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ChangeSubscriptionStatusRequest $changeSubscriptionStatusRequest): void
    {
        $changeSubscriptionStatusRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEmail(ChangeSubscriptionStatusRequest $changeSubscriptionStatusRequest): void
    {
        $this->expectException(ValidationException::class);

        $changeSubscriptionStatusRequest->email = null;

        $changeSubscriptionStatusRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSubscriptionState(ChangeSubscriptionStatusRequest $changeSubscriptionStatusRequest): void
    {
        $this->expectException(ValidationException::class);

        $changeSubscriptionStatusRequest->subscription_state = null;

        $changeSubscriptionStatusRequest->validate(true);
    }

    public function validProvider(): array
    {
        $changeSubscriptionStatusRequest1 = new ChangeSubscriptionStatusRequest();

        $changeSubscriptionStatusRequest1->email = 'email';
        $changeSubscriptionStatusRequest1->subscription_state = 'subscription_state';

        return [
            [$changeSubscriptionStatusRequest1]
        ];
    }
}
