<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\WindowsUniversalPush;
use PHPUnit\Framework\TestCase;

class WindowsUniversalPushTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(WindowsUniversalPush $windowsUniversalPush): void
    {
        $windowsUniversalPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoPushType(WindowsUniversalPush $windowsUniversalPush): void
    {
        $this->expectException(ValidationException::class);

        $windowsUniversalPush->push_type = null;

        $windowsUniversalPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoToastText1(WindowsUniversalPush $windowsUniversalPush): void
    {
        $this->expectException(ValidationException::class);

        $windowsUniversalPush->toast_text1 = null;

        $windowsUniversalPush->validate(true);
    }

    public function validProvider(): array
    {
        $windowsUniversalPush1 = new WindowsUniversalPush();

        $windowsUniversalPush1->push_type = 'push_type';
        $windowsUniversalPush1->toast_text1 = 'toast_text1';

        return [
            [$windowsUniversalPush1]
        ];
    }
}
