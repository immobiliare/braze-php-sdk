<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Kpi;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Kpi\DailyNewUsersRequest;
use PHPUnit\Framework\TestCase;

class DailyNewUsersRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(DailyNewUsersRequest $dailyNewUsersRequest): void
    {
        $dailyNewUsersRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLength(DailyNewUsersRequest $dailyNewUsersRequest): void
    {
        $this->expectException(ValidationException::class);

        $dailyNewUsersRequest->length = null;

        $dailyNewUsersRequest->validate(true);
    }

    public function validProvider(): array
    {
        $dailyNewUsersRequest1 = new DailyNewUsersRequest();

        $dailyNewUsersRequest1->length = 'length';

        return [
            [$dailyNewUsersRequest1]
        ];
    }
}
