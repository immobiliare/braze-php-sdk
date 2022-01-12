<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\WebPushActionButton;
use PHPUnit\Framework\TestCase;

class WebPushActionButtonTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(WebPushActionButton $webPushActionButton): void
    {
        $webPushActionButton->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoText(WebPushActionButton $webPushActionButton): void
    {
        $this->expectException(ValidationException::class);

        $webPushActionButton->text = null;

        $webPushActionButton->validate(true);
    }

    public function validProvider(): array
    {
        $webPushActionButton1 = new WebPushActionButton();

        $webPushActionButton1->text = 'text';

        return [
            [$webPushActionButton1]
        ];
    }
}
