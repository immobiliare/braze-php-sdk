<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\AndroidConversationPushPerson;
use PHPUnit\Framework\TestCase;

class AndroidConversationPushPersonTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(AndroidConversationPushPerson $androidConversationPushPerson): void
    {
        $androidConversationPushPerson->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoId(AndroidConversationPushPerson $androidConversationPushPerson): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPushPerson->id = null;

        $androidConversationPushPerson->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoName(AndroidConversationPushPerson $androidConversationPushPerson): void
    {
        $this->expectException(ValidationException::class);

        $androidConversationPushPerson->name = null;

        $androidConversationPushPerson->validate(true);
    }

    public function validProvider(): array
    {
        $androidConversationPushPerson1 = new AndroidConversationPushPerson();

        $androidConversationPushPerson1->id = 'id';
        $androidConversationPushPerson1->name = 'name';

        return [
            [$androidConversationPushPerson1]
        ];
    }
}
