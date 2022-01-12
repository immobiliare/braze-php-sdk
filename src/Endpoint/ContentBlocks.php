<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\CreateRequest;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\InfoRequest;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\ListRequest;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\UpdateRequest;
use ImmobiliareLabs\BrazeSDK\Response\ContentBlocks\CreateResponse;
use ImmobiliareLabs\BrazeSDK\Response\ContentBlocks\InfoResponse;
use ImmobiliareLabs\BrazeSDK\Response\ContentBlocks\ListResponse;
use ImmobiliareLabs\BrazeSDK\Response\ContentBlocks\UpdateResponse;

class ContentBlocks extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/content_blocks_templates/get_list_email_content_blocks/
     */
    public function list(ListRequest $request, bool $resolveResponse = true): ListResponse
    {
        return $this->makeRequest('GET', '/content_blocks/list', $request, ListResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/content_blocks_templates/get_see_email_content_blocks_information/
     */
    public function info(InfoRequest $request, bool $resolveResponse = true): InfoResponse
    {
        return $this->makeRequest('GET', '/content_blocks/info', $request, InfoResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/content_blocks_templates/post_create_email_content_block/
     */
    public function create(CreateRequest $request, bool $resolveResponse = true): CreateResponse
    {
        return $this->makeRequest('POST', '/content_blocks/create', $request, CreateResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/templates/content_blocks_templates/post_update_content_block/
     */
    public function update(UpdateRequest $request, bool $resolveResponse = true): UpdateResponse
    {
        return $this->makeRequest('POST', '/content_blocks/update', $request, UpdateResponse::class, $resolveResponse);
    }
}
