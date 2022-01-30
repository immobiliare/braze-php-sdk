<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use DateTimeImmutable;
use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Object\Event;
use PHPUnit\Framework\TestCase;

class BaseObjectTest extends TestCase
{
    public function testJsonSerialize(): void
    {
        $event = new Event();
        $event->time = new DateTimeImmutable();

        $serialized = $event->jsonSerialize();

        $this->assertSame($event->time->format(DateTimeInterface::ATOM), $serialized['time']);
    }
}
