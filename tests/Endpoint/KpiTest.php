<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Kpi;

class KpiTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->kpi()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['dailyNewUsers', Kpi\DailyNewUsersRequest::class],
            ['dailyActiveUsers', Kpi\DailyActiveUsersRequest::class],
            ['monthlyActiveUsers', Kpi\MonthlyActiveUsersRequest::class],
            ['dailyUninstalls', Kpi\DailyUninstallsRequest::class],
        ];
    }
}
