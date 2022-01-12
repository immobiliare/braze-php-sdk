<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Transactional\SendEmailRequest;
use ImmobiliareLabs\BrazeSDK\Response\Transactional\SendEmailResponse;

class Transactional extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_send_transactional_message/
     */
    public function sendEmail(SendEmailRequest $request, bool $resolveResponse = true): SendEmailResponse
    {
        $campaignId = $request->campaign_id ?? '-';
        $request->campaign_id = null;

        return $this->makeRequest('POST', sprintf('/transactional/v1/campaigns/%s/send', $campaignId), $request, SendEmailResponse::class, $resolveResponse);
    }
}
