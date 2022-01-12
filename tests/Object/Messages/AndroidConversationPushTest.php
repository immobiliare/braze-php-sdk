<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\AndroidConversationPush;
use PHPUnit\Framework\TestCase;

class AndroidConversationPushTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(AndroidConversationPush $androidConversationPush): void
    {
        $androidConversationPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoShortcutId(AndroidConversationPush $androidConversationPush): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPush->shortcut_id = null;

        $androidConversationPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoReplyPersonId(AndroidConversationPush $androidConversationPush): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPush->reply_person_id = null;

        $androidConversationPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoMessages(AndroidConversationPush $androidConversationPush): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPush->messages = null;

        $androidConversationPush->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoPersons(AndroidConversationPush $androidConversationPush): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPush->persons = null;

        $androidConversationPush->validate(true);
    }

    public function validProvider(): array
    {
        $androidConversationPush1 = new AndroidConversationPush();

        $androidConversationPush1->shortcut_id = 'shortcut_id';
        $androidConversationPush1->reply_person_id = 'reply_person_id';
        $androidConversationPush1->messages = 'messages';
        $androidConversationPush1->persons = 'persons';

        return [
            [$androidConversationPush1]
        ];
    }
}
