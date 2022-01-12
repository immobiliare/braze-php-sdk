<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\WindowsPhone8Push;
use PHPUnit\Framework\TestCase;

class WindowsPhone8PushTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(WindowsPhone8Push $windowsPhone8Push): void
    {
        $windowsPhone8Push->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoToastContent(WindowsPhone8Push $windowsPhone8Push): void
    {
        $this->expectException(ValidationException::class);

        $windowsPhone8Push->toast_content = null;

        $windowsPhone8Push->validate(true);
    }

    public function validProvider(): array
    {
        $windowsPhone8Push1 = new WindowsPhone8Push();

        $windowsPhone8Push1->toast_content = 'toast_content';

        return [
            [$windowsPhone8Push1]
        ];
    }
}
