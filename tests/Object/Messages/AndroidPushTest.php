<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\AndroidPush;
use PHPUnit\Framework\TestCase;

class AndroidPushTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(AndroidPush $androidPush): void
    {
        $androidPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoAlert(AndroidPush $androidPush): void
    {
        $this->expectException(ValidationException::class);

        $androidPush->alert = null;

        $androidPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTitle(AndroidPush $androidPush): void
    {
        $this->expectException(ValidationException::class);

        $androidPush->title = null;

        $androidPush->validate(true);
    }

    public function validProvider(): array
    {
        $androidPush1 = new AndroidPush();

        $androidPush1->alert = 'alert';
        $androidPush1->title = 'title';

        return [
            [$androidPush1]
        ];
    }
}
