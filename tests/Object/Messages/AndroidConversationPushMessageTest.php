<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\AndroidConversationPushMessage;
use PHPUnit\Framework\TestCase;

class AndroidConversationPushMessageTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(AndroidConversationPushMessage $androidConversationPushMessage): void
    {
        $androidConversationPushMessage->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoText(AndroidConversationPushMessage $androidConversationPushMessage): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPushMessage->text = null;

        $androidConversationPushMessage->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTimestamp(AndroidConversationPushMessage $androidConversationPushMessage): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPushMessage->timestamp = null;

        $androidConversationPushMessage->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoPersonId(AndroidConversationPushMessage $androidConversationPushMessage): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPushMessage->person_id = null;

        $androidConversationPushMessage->validate(true);
    }

    public function validProvider(): array
    {
        $androidConversationPushMessage1 = new AndroidConversationPushMessage();

        $androidConversationPushMessage1->text = 'text';
        $androidConversationPushMessage1->timestamp = time();
        $androidConversationPushMessage1->person_id = 'person_id';

        return [
            [$androidConversationPushMessage1]
        ];
    }
}
