<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Sends\CreateRequest;
use ImmobiliareLabs\BrazeSDK\Response\Sends\CreateResponse;

class Sends extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_create_send_ids/
     */
    public function create(CreateRequest $request, bool $resolveResponse = true): CreateResponse
    {
        return $this->makeRequest('POST', '/sends/id/create', $request, CreateResponse::class, $resolveResponse);
    }
}
