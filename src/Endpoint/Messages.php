<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Messages\CreateScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Request\Messages\DeleteScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Request\Messages\ScheduledBroadcastsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Messages\SendRequest;
use ImmobiliareLabs\BrazeSDK\Request\Messages\UpdateScheduleRequest;
use ImmobiliareLabs\BrazeSDK\Response\Messages\CreateScheduleResponse;
use ImmobiliareLabs\BrazeSDK\Response\Messages\DeleteScheduleResponse;
use ImmobiliareLabs\BrazeSDK\Response\Messages\ScheduledBroadcastsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Messages\SendResponse;
use ImmobiliareLabs\BrazeSDK\Response\Messages\UpdateScheduleResponse;

class Messages extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_send_messages/
     */
    public function send(SendRequest $request, bool $resolveResponse = true): SendResponse
    {
        return $this->makeRequest('POST', '/messages/send', $request, SendResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_schedule_messages/
     */
    public function createSchedule(CreateScheduleRequest $request, bool $resolveResponse = true): CreateScheduleResponse
    {
        return $this->makeRequest('POST', '/messages/schedule/create', $request, CreateScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_update_scheduled_messages/
     */
    public function updateSchedule(UpdateScheduleRequest $request, bool $resolveResponse = true): UpdateScheduleResponse
    {
        return $this->makeRequest('POST', '/messages/schedule/update', $request, UpdateScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/post_delete_scheduled_messages/
     */
    public function deleteSchedule(DeleteScheduleRequest $request, bool $resolveResponse = true): DeleteScheduleResponse
    {
        return $this->makeRequest('POST', '/messages/schedule/delete', $request, DeleteScheduleResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/schedule_messages/get_messages_scheduled/
     */
    public function scheduledBroadcasts(ScheduledBroadcastsRequest $request, bool $resolveResponse = true): ScheduledBroadcastsResponse
    {
        return $this->makeRequest('POST', '/messages/scheduled_broadcasts', $request, ScheduledBroadcastsResponse::class, $resolveResponse);
    }
}
