<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\ApplePushActionButton;
use PHPUnit\Framework\TestCase;

class ApplePushActionButtonTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ApplePushActionButton $applePushActionButton): void
    {
        $applePushActionButton->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoActionId(ApplePushActionButton $applePushActionButton): void
    {
        $this->expectException(ValidationException::class);

        $applePushActionButton->action_id = null;

        $applePushActionButton->validate(true);
    }

    public function validProvider(): array
    {
        $applePushActionButton1 = new ApplePushActionButton();

        $applePushActionButton1->action_id = 'action_id';

        return [
            [$applePushActionButton1]
        ];
    }
}
