<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Object\Messages\ApplePushAlert;
use PHPUnit\Framework\TestCase;

class ApplePushAlertTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ApplePushAlert $applePushAlert): void
    {
        $applePushAlert->validate(true);
    }

    public function validProvider(): array
    {
        $applePushAlert1 = new ApplePushAlert();


        return [
            [$applePushAlert1]
        ];
    }
}
