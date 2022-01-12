<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\KindlePush;
use PHPUnit\Framework\TestCase;

class KindlePushTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(KindlePush $kindlePush): void
    {
        $kindlePush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoAlert(KindlePush $kindlePush): void
    {
        $this->expectException(ValidationException::class);

        $kindlePush->alert = null;

        $kindlePush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTitle(KindlePush $kindlePush): void
    {
        $this->expectException(ValidationException::class);

        $kindlePush->title = null;

        $kindlePush->validate(true);
    }

    public function validProvider(): array
    {
        $kindlePush1 = new KindlePush();

        $kindlePush1->alert = 'alert';
        $kindlePush1->title = 'title';

        return [
            [$kindlePush1]
        ];
    }
}
