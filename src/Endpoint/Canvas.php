<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Canvas\AnalyticsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\CreateScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\DeleteScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\DetailsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\ListRequest;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\SummaryRequest;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\TriggerSendRequest;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\UpdateScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\AnalyticsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\CreateScheduleResponse;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\DeleteScheduleResponse;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\DetailsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\ListResponse;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\SummaryResponse;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\TriggerSendResponse;
use ImmobiliareLabs\BrazeSDK\Response\Canvas\UpdateScheduleResponse;

class Canvas extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_send_triggered_canvases/
     */
    public function triggerSend(TriggerSendRequest $request, bool $resolveResponse = true): TriggerSendResponse
    {
        return $this->makeRequest('POST', '/canvas/trigger/send', $request, TriggerSendResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_schedule_triggered_canvases/
     */
    public function createSchedule(CreateScheduleRequest $request, bool $resolveResponse = true): CreateScheduleResponse
    {
        return $this->makeRequest('POST', '/canvas/trigger/schedule/create', $request, CreateScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_update_scheduled_triggered_canvases/
     */
    public function updateSchedule(UpdateScheduleRequest $request, bool $resolveResponse = true): UpdateScheduleResponse
    {
        return $this->makeRequest('POST', '/canvas/trigger/schedule/update', $request, UpdateScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_delete_scheduled_triggered_canvases/
     */
    public function deleteSchedule(DeleteScheduleRequest $request, bool $resolveResponse = true): DeleteScheduleResponse
    {
        return $this->makeRequest('POST', '/canvas/trigger/schedule/delete', $request, DeleteScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/canvas/get_canvas_analytics_summary/
     */
    public function summary(SummaryRequest $request, bool $resolveResponse = true): SummaryResponse
    {
        return $this->makeRequest('GET', '/canvas/data_summary', $request, SummaryResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/canvas/get_canvas_analytics/
     */
    public function analytics(AnalyticsRequest $request, bool $resolveResponse = true): AnalyticsResponse
    {
        return $this->makeRequest('GET', '/canvas/data_series', $request, AnalyticsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/canvas/get_canvas_details/
     */
    public function details(DetailsRequest $request, bool $resolveResponse = true): DetailsResponse
    {
        return $this->makeRequest('GET', '/canvas/details', $request, DetailsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/canvas/get_canvases/
     */
    public function list(ListRequest $request, bool $resolveResponse = true): ListResponse
    {
        return $this->makeRequest('GET', '/canvas/list', $request, ListResponse::class, $resolveResponse);
    }
}
