<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Email\BlacklistRequest;
use ImmobiliareLabs\BrazeSDK\Request\Email\ChangeSubscriptionStatusRequest;
use ImmobiliareLabs\BrazeSDK\Request\Email\QueryHardBouncedRequest;
use ImmobiliareLabs\BrazeSDK\Request\Email\QueryUnsubscribedRequest;
use ImmobiliareLabs\BrazeSDK\Request\Email\RemoveFromSpamListRequest;
use ImmobiliareLabs\BrazeSDK\Request\Email\RemoveHardBouncedRequest;
use ImmobiliareLabs\BrazeSDK\Response\Email\BlacklistResponse;
use ImmobiliareLabs\BrazeSDK\Response\Email\ChangeSubscriptionStatusResponse;
use ImmobiliareLabs\BrazeSDK\Response\Email\QueryHardBouncedResponse;
use ImmobiliareLabs\BrazeSDK\Response\Email\QueryUnsubscribedResponse;
use ImmobiliareLabs\BrazeSDK\Response\Email\RemoveFromSpamListResponse;
use ImmobiliareLabs\BrazeSDK\Response\Email\RemoveHardBouncedResponse;

class Email extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/email/get_list_hard_bounces/
     */
    public function queryHardBounced(QueryHardBouncedRequest $request, bool $resolveResponse = true): QueryHardBouncedResponse
    {
        return $this->makeRequest('GET', '/email/hard_bounces', $request, QueryHardBouncedResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/email/get_query_unsubscribed_email_addresses/
     */
    public function queryUnsubscribed(QueryUnsubscribedRequest $request, bool $resolveResponse = true): QueryUnsubscribedResponse
    {
        return $this->makeRequest('GET', '/email/unsubscribes', $request, QueryUnsubscribedResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/email/post_email_subscription_status/
     */
    public function changeSubscriptionStatus(ChangeSubscriptionStatusRequest $request, bool $resolveResponse = true): ChangeSubscriptionStatusResponse
    {
        return $this->makeRequest('POST', '/email/status', $request, ChangeSubscriptionStatusResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/email/post_remove_hard_bounces/
     */
    public function removeHardBounced(RemoveHardBouncedRequest $request, bool $resolveResponse = true): RemoveHardBouncedResponse
    {
        return $this->makeRequest('POST', '/email/bounce/remove', $request, RemoveHardBouncedResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/email/post_remove_spam/
     */
    public function removeFromSpamList(RemoveFromSpamListRequest $request, bool $resolveResponse = true): RemoveFromSpamListResponse
    {
        return $this->makeRequest('POST', '/email/spam/remove', $request, RemoveFromSpamListResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/email/post_blacklist/
     */
    public function blacklist(BlacklistRequest $request, bool $resolveResponse = true): BlacklistResponse
    {
        return $this->makeRequest('POST', '/email/blacklist', $request, BlacklistResponse::class, $resolveResponse);
    }
}
