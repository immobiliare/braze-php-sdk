<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\CreateRequest;
use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\InfoRequest;
use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\ListRequest;
use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\UpdateRequest;
use ImmobiliareLabs\BrazeSDK\Response\EmailTemplates\CreateResponse;
use ImmobiliareLabs\BrazeSDK\Response\EmailTemplates\InfoResponse;
use ImmobiliareLabs\BrazeSDK\Response\EmailTemplates\ListResponse;
use ImmobiliareLabs\BrazeSDK\Response\EmailTemplates\UpdateResponse;

class EmailTemplates extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/email_templates/get_list_email_templates/
     */
    public function list(ListRequest $request, bool $resolveResponse = true): ListResponse
    {
        return $this->makeRequest('GET', '/templates/email/list', $request, ListResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/email_templates/get_see_email_template_information/
     */
    public function info(InfoRequest $request, bool $resolveResponse = true): InfoResponse
    {
        return $this->makeRequest('GET', '/templates/email/info', $request, InfoResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/email_templates/post_create_email_template/
     */
    public function create(CreateRequest $request, bool $resolveResponse = true): CreateResponse
    {
        return $this->makeRequest('POST', '/templates/email/create', $request, CreateResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/email_templates/post_update_email_template/
     */
    public function update(UpdateRequest $request, bool $resolveResponse = true): UpdateResponse
    {
        return $this->makeRequest('POST', '/templates/email/update', $request, UpdateResponse::class, $resolveResponse);
    }
}
