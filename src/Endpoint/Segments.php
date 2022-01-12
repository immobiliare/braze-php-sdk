<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Segments\AnalyticsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Segments\DetailsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Segments\ListRequest;
use ImmobiliareLabs\BrazeSDK\Response\Segments\AnalyticsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Segments\DetailsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Segments\ListResponse;

class Segments extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/export/segments/get_segment/
     */
    public function list(ListRequest $request, bool $resolveResponse = true): ListResponse
    {
        return $this->makeRequest('GET', '/segments/list', $request, ListResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/segments/get_segment_analytics/
     */
    public function analytics(AnalyticsRequest $request, bool $resolveResponse = true): AnalyticsResponse
    {
        return $this->makeRequest('GET', '/segments/data_series', $request, AnalyticsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/segments/get_segment_details/
     */
    public function details(DetailsRequest $request, bool $resolveResponse = true): DetailsResponse
    {
        return $this->makeRequest('GET', '/segments/details', $request, DetailsResponse::class, $resolveResponse);
    }
}
