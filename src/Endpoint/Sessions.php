<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Sessions\AnalyticsRequest;
use ImmobiliareLabs\BrazeSDK\Response\Sessions\AnalyticsResponse;

class Sessions extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/export/sessions/get_sessions_analytics/
     */
    public function analytics(AnalyticsRequest $request, bool $resolveResponse = true): AnalyticsResponse
    {
        return $this->makeRequest('GET', '/sessions/data_series', $request, AnalyticsResponse::class, $resolveResponse);
    }
}
