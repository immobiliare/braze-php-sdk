<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Events\AnalyticsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Events\ListRequest;
use ImmobiliareLabs\BrazeSDK\Response\Events\AnalyticsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Events\ListResponse;

class Events extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/export/custom_events/get_custom_events/
     */
    public function list(ListRequest $request, bool $resolveResponse = true): ListResponse
    {
        return $this->makeRequest('GET', '/events/list', $request, ListResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/custom_events/get_custom_events_analytics/
     */
    public function analytics(AnalyticsRequest $request, bool $resolveResponse = true): AnalyticsResponse
    {
        return $this->makeRequest('GET', '/events/data_series', $request, AnalyticsResponse::class, $resolveResponse);
    }
}
