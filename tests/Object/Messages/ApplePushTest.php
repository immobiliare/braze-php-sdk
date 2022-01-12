<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Object\Messages\ApplePush;
use PHPUnit\Framework\TestCase;

class ApplePushTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ApplePush $applePush): void
    {
        $applePush->validate(true);
    }

    public function validProvider(): array
    {
        $applePush1 = new ApplePush();


        return [
            [$applePush1]
        ];
    }
}
