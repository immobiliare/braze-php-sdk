<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Feed\AnalyticsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Feed\DetailsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Feed\ListRequest;
use ImmobiliareLabs\BrazeSDK\Response\Feed\AnalyticsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Feed\DetailsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Feed\ListResponse;

class Feed extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/export/news_feed/get_news_feed_card_analytics/
     */
    public function analytics(AnalyticsRequest $request, bool $resolveResponse = true): AnalyticsResponse
    {
        return $this->makeRequest('GET', '/feed/data_series', $request, AnalyticsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/news_feed/get_news_feed_card_details/
     */
    public function details(DetailsRequest $request, bool $resolveResponse = true): DetailsResponse
    {
        return $this->makeRequest('GET', '/feed/details', $request, DetailsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/news_feed/get_news_feed_cards/
     */
    public function list(ListRequest $request, bool $resolveResponse = true): ListResponse
    {
        return $this->makeRequest('GET', '/feed/list', $request, ListResponse::class, $resolveResponse);
    }
}
