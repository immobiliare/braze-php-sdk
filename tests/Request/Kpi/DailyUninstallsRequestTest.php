<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Kpi;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Kpi\DailyUninstallsRequest;
use PHPUnit\Framework\TestCase;

class DailyUninstallsRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(DailyUninstallsRequest $dailyUninstallsRequest): void
    {
        $dailyUninstallsRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLength(DailyUninstallsRequest $dailyUninstallsRequest): void
    {
        $this->expectException(ValidationException::class);

        $dailyUninstallsRequest->length = null;

        $dailyUninstallsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $dailyUninstallsRequest1 = new DailyUninstallsRequest();

        $dailyUninstallsRequest1->length = 1;

        return [
            [$dailyUninstallsRequest1]
        ];
    }
}
