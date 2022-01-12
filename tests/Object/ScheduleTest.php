<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use PHPUnit\Framework\TestCase;

class ScheduleTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(Schedule $schedule): void
    {
        $schedule->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTime(Schedule $schedule): void
    {
        $this->expectException(ValidationException::class);

        $schedule->time = null;

        $schedule->validate(false);
    }

    public function validProvider(): array
    {
        $schedule = new Schedule();
        $schedule->time = new \DateTimeImmutable();

        return [
            [$schedule],
        ];
    }
}
