<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Event;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use PHPUnit\Framework\TestCase;

final class EventTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(Event $event): void
    {
        $event->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUserIdentifier(Event $event): void
    {
        $this->expectException(ValidationException::class);
        $event->external_id = null;
        $event->user_alias = null;
        $event->braze_id = null;

        $event->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoName(Event $event): void
    {
        $this->expectException(ValidationException::class);
        $event->name = null;

        $event->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTime(Event $event): void
    {
        $this->expectException(ValidationException::class);
        $event->time = null;

        $event->validate(false);
    }

    public function validProvider(): array
    {
        $event1 = new Event();
        $event1->external_id = 'external_id';
        $event1->name = 'name';
        $event1->time = new \DateTimeImmutable();

        $event2 = new Event();
        $event2->user_alias = new UserAlias();
        $event2->user_alias->alias_name = 'alias_name';
        $event2->user_alias->alias_label = 'alias_label';
        $event2->name = 'name';
        $event2->time = new \DateTimeImmutable();

        $event3 = new Event();
        $event3->braze_id = 'braze_id';
        $event3->name = 'name';
        $event3->time = new \DateTimeImmutable();

        return [
            [$event1],
            [$event2],
            [$event3],
        ];
    }
}
