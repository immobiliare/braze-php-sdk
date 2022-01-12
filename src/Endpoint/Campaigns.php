<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Campaigns\AnalyticsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\CreateScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\DeleteScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\DetailsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\ListRequest;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\TriggerSendRequest;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\UpdateScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Response\Campaigns\AnalyticsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Campaigns\CreateScheduleResponse;
use ImmobiliareLabs\BrazeSDK\Response\Campaigns\DeleteScheduleResponse;
use ImmobiliareLabs\BrazeSDK\Response\Campaigns\DetailsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Campaigns\ListResponse;
use ImmobiliareLabs\BrazeSDK\Response\Campaigns\TriggerSendResponse;
use ImmobiliareLabs\BrazeSDK\Response\Campaigns\UpdateScheduleResponse;

class Campaigns extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_send_triggered_campaigns/
     */
    public function triggerSend(TriggerSendRequest $request, bool $resolveResponse = true): TriggerSendResponse
    {
        return $this->makeRequest('POST', '/campaigns/trigger/send', $request, TriggerSendResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_schedule_triggered_campaigns/
     */
    public function createSchedule(CreateScheduleRequest $request, bool $resolveResponse = true): CreateScheduleResponse
    {
        return $this->makeRequest('POST', '/campaigns/trigger/schedule/create', $request, CreateScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_update_scheduled_triggered_campaigns/
     */
    public function updateSchedule(UpdateScheduleRequest $request, bool $resolveResponse = true): UpdateScheduleResponse
    {
        return $this->makeRequest('POST', '/campaigns/trigger/schedule/update', $request, UpdateScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_delete_scheduled_triggered_messages/
     */
    public function deleteSchedule(DeleteScheduleRequest $request, bool $resolveResponse = true): DeleteScheduleResponse
    {
        return $this->makeRequest('POST', '/campaigns/trigger/schedule/delete', $request, DeleteScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/campaigns/get_campaign_analytics/
     */
    public function analytics(AnalyticsRequest $request, bool $resolveResponse = true): AnalyticsResponse
    {
        return $this->makeRequest('POST', '/campaigns/data_series', $request, AnalyticsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/campaigns/get_campaign_details/
     */
    public function details(DetailsRequest $request, bool $resolveResponse = true): DetailsResponse
    {
        return $this->makeRequest('POST', '/campaigns/details', $request, DetailsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_delete_scheduled_triggered_messages/
     */
    public function list(ListRequest $request, bool $resolveResponse = true): ListResponse
    {
        return $this->makeRequest('POST', '/campaigns/list', $request, ListResponse::class, $resolveResponse);
    }
}
