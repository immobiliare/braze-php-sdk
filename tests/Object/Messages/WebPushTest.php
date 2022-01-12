<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\WebPush;
use PHPUnit\Framework\TestCase;

class WebPushTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(WebPush $webPush): void
    {
        $webPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoAlert(WebPush $webPush): void
    {
        $this->expectException(ValidationException::class);

        $webPush->alert = null;

        $webPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTitle(WebPush $webPush): void
    {
        $this->expectException(ValidationException::class);

        $webPush->title = null;

        $webPush->validate(true);
    }

    public function validProvider(): array
    {
        $webPush1 = new WebPush();

        $webPush1->alert = 'alert';
        $webPush1->title = 'title';

        return [
            [$webPush1]
        ];
    }
}
