<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\SMS;
use PHPUnit\Framework\TestCase;

class SMSTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(SMS $sMS): void
    {
        $sMS->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSubscriptionGroupId(SMS $sMS): void
    {
        $this->expectException(ValidationException::class);

        $sMS->subscription_group_id = null;

        $sMS->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoBody(SMS $sMS): void
    {
        $this->expectException(ValidationException::class);

        $sMS->body = null;

        $sMS->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoAppId(SMS $sMS): void
    {
        $this->expectException(ValidationException::class);

        $sMS->app_id = null;

        $sMS->validate(true);
    }

    public function validProvider(): array
    {
        $sMS1 = new SMS();

        $sMS1->subscription_group_id = 'subscription_group_id';
        $sMS1->body = 'body';
        $sMS1->app_id = 'app_id';

        return [
            [$sMS1]
        ];
    }
}
