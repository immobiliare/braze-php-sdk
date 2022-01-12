<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Kpi\DailyActiveUsersRequest;
use ImmobiliareLabs\BrazeSDK\Request\Kpi\DailyNewUsersRequest;
use ImmobiliareLabs\BrazeSDK\Request\Kpi\DailyUninstallsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Kpi\MonthlyActiveUsersRequest;
use ImmobiliareLabs\BrazeSDK\Response\Kpi\DailyActiveUsersResponse;
use ImmobiliareLabs\BrazeSDK\Response\Kpi\DailyNewUsersResponse;
use ImmobiliareLabs\BrazeSDK\Response\Kpi\DailyUninstallsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Kpi\MonthlyActiveUsersResponse;

class Kpi extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/export/kpi/get_kpi_daily_new_users_date/
     */
    public function dailyNewUsers(DailyNewUsersRequest $request, bool $resolveResponse = true): DailyNewUsersResponse
    {
        return $this->makeRequest('GET', '/kpi/new_users/data_series', $request, DailyNewUsersResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/kpi/get_kpi_dau_date/
     */
    public function dailyActiveUsers(DailyActiveUsersRequest $request, bool $resolveResponse = true): DailyActiveUsersResponse
    {
        return $this->makeRequest('GET', '/kpi/dau/data_series', $request, DailyActiveUsersResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/kpi/get_kpi_mau_30_days/
     */
    public function monthlyActiveUsers(MonthlyActiveUsersRequest $request, bool $resolveResponse = true): MonthlyActiveUsersResponse
    {
        return $this->makeRequest('GET', '/kpi/mau/data_series', $request, MonthlyActiveUsersResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/kpi/get_kpi_uninstalls_date/
     */
    public function dailyUninstalls(DailyUninstallsRequest $request, bool $resolveResponse = true): DailyUninstallsResponse
    {
        return $this->makeRequest('GET', '/kpi/uninstalls/data_series', $request, DailyUninstallsResponse::class, $resolveResponse);
    }
}
