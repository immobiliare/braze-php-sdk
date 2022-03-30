<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Kpi;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Kpi\DailyActiveUsersRequest;
use PHPUnit\Framework\TestCase;

class DailyActiveUsersRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(DailyActiveUsersRequest $dailyActiveUsersRequest): void
    {
        $dailyActiveUsersRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLength(DailyActiveUsersRequest $dailyActiveUsersRequest): void
    {
        $this->expectException(ValidationException::class);

        $dailyActiveUsersRequest->length = null;

        $dailyActiveUsersRequest->validate(true);
    }

    public function validProvider(): array
    {
        $dailyActiveUsersRequest1 = new DailyActiveUsersRequest();

        $dailyActiveUsersRequest1->length = 1;

        return [
            [$dailyActiveUsersRequest1]
        ];
    }
}
