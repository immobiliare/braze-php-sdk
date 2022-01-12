<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\AndroidPushActionButton;
use PHPUnit\Framework\TestCase;

class AndroidPushActionButtonTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(AndroidPushActionButton $androidPushActionButton): void
    {
        $androidPushActionButton->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoText(AndroidPushActionButton $androidPushActionButton): void
    {
        $this->expectException(ValidationException::class);

        $androidPushActionButton->text = null;

        $androidPushActionButton->validate(true);
    }

    public function validProvider(): array
    {
        $androidPushActionButton1 = new AndroidPushActionButton();

        $androidPushActionButton1->text = 'text';

        return [
            [$androidPushActionButton1]
        ];
    }
}
