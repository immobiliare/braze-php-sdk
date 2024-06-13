<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Event;
use ImmobiliareLabs\BrazeSDK\Object\UserAttributes;
use ImmobiliareLabs\BrazeSDK\Request\Users\TrackRequest;
use PHPUnit\Framework\TestCase;

class TrackRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(TrackRequest $trackRequest): void
    {
        $trackRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoContent(TrackRequest $trackRequest): void
    {
        $this->expectException(ValidationException::class);

        $trackRequest->events = null;
        $trackRequest->attributes = null;

        $trackRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValidLoose(TrackRequest $trackRequest): void
    {
        foreach ($trackRequest->events as $event) {
            $event->external_id = null;
        }

        $trackRequest->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNotValidLoose(TrackRequest $trackRequest): void
    {
        $this->expectException(ValidationException::class);

        foreach ($trackRequest->events as $event) {
            $event->external_id = null;
        }

        foreach ($trackRequest->attributes as $attribute) {
            $attribute->external_id = null;
        }

        $trackRequest->validate(false);
    }

    public function testFromArray(): void
    {
        $attributes = [ new UserAttributes() ];

        $trackRequest = TrackRequest::fromArray([
            'attributes' => $attributes
        ]);

        $this->assertSame($attributes, $trackRequest->attributes);
    }

    public function validProvider(): array
    {
        $event1 = new Event();
        $event1->external_id = 'external_id';
        $event1->name = 'name';
        $event1->time = new \DateTimeImmutable();

        $attribute1 = new UserAttributes();
        $attribute1->external_id = 'external_id';

        $trackRequest1 = new TrackRequest();
        $trackRequest1->events = [$event1];
        $trackRequest1->attributes = [$attribute1];

        return [
            [$trackRequest1],
        ];
    }
}
