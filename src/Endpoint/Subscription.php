<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Subscription\GetStatusRequest;
use ImmobiliareLabs\BrazeSDK\Request\Subscription\ListUserGroupsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Subscription\UpdateStatusRequest;
use ImmobiliareLabs\BrazeSDK\Response\Subscription\GetStatusResponse;
use ImmobiliareLabs\BrazeSDK\Response\Subscription\ListUserGroupsResponse;
use ImmobiliareLabs\BrazeSDK\Response\Subscription\UpdateStatusResponse;

class Subscription extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/subscription_groups/get_list_user_subscription_group_status/
     */
    public function getStatus(GetStatusRequest $request, bool $resolveResponse = true): GetStatusResponse
    {
        return $this->makeRequest('GET', '/subscription/status/get', $request, GetStatusResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/subscription_groups/get_list_user_subscription_groups/
     */
    public function listUserGroups(ListUserGroupsRequest $request, bool $resolveResponse = true): ListUserGroupsResponse
    {
        return $this->makeRequest('GET', '//subscription/user/status', $request, ListUserGroupsResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/subscription_groups/post_update_user_subscription_group_status/
     */
    public function updateStatus(UpdateStatusRequest $request, bool $resolveResponse = true): UpdateStatusResponse
    {
        return $this->makeRequest('POST', '/subscription/status/set', $request, UpdateStatusResponse::class, $resolveResponse);
    }
}
