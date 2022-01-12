<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Kpi;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Kpi\MonthlyActiveUsersRequest;
use PHPUnit\Framework\TestCase;

class MonthlyActiveUsersRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(MonthlyActiveUsersRequest $monthlyActiveUsersRequest): void
    {
        $monthlyActiveUsersRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLength(MonthlyActiveUsersRequest $monthlyActiveUsersRequest): void
    {
        $this->expectException(ValidationException::class);

        $monthlyActiveUsersRequest->length = null;

        $monthlyActiveUsersRequest->validate(true);
    }

    public function validProvider(): array
    {
        $monthlyActiveUsersRequest1 = new MonthlyActiveUsersRequest();

        $monthlyActiveUsersRequest1->length = 'length';

        return [
            [$monthlyActiveUsersRequest1]
        ];
    }
}
