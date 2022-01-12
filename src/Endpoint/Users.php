<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Users\CreateAliasRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\DeleteRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\ExportByGlobalControlGroupRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\ExportByIdentifierRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\ExportBySegmentRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\IdentifyRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\RemoveExternalIDRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\RenameExternalIDRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\TrackRequest;
use ImmobiliareLabs\BrazeSDK\Response\Users\CreateAliasResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\DeleteResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\ExportByGlobalControlGroupResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\ExportByIdentifierResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\ExportBySegmentResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\IdentifyResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\RemoveExternalIDResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\RenameExternalIDResponse;
use ImmobiliareLabs\BrazeSDK\Response\Users\TrackResponse;

class Users extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/user_data/post_user_track/
     */
    public function track(TrackRequest $request, bool $resolveResponse = true): TrackResponse
    {
        return $this->makeRequest('POST', '/users/track', $request, TrackResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/user_data/post_user_alias/
     */
    public function createAlias(CreateAliasRequest $request, bool $resolveResponse = true): CreateAliasResponse
    {
        return $this->makeRequest('POST', '/users/alias/new', $request, CreateAliasResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/user_data/post_user_identify/
     */
    public function identify(IdentifyRequest $request, bool $resolveResponse = true): IdentifyResponse
    {
        return $this->makeRequest('POST', '/users/identify', $request, IdentifyResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/user_data/post_user_delete/
     */
    public function delete(DeleteRequest $request, bool $resolveResponse = true): DeleteResponse
    {
        return $this->makeRequest('POST', '/users/delete', $request, DeleteResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/user_data/external_id_migration/post_external_ids_rename/
     */
    public function renameExternalID(RenameExternalIDRequest $request, bool $resolveResponse = true): RenameExternalIDResponse
    {
        return $this->makeRequest('POST', '/users/external_ids/rename', $request, RenameExternalIDResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/user_data/external_id_migration/post_external_ids_remove/
     */
    public function removeExternalID(RemoveExternalIDRequest $request, bool $resolveResponse = true): RemoveExternalIDResponse
    {
        return $this->makeRequest('POST', '/users/external_ids/remove', $request, RemoveExternalIDResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/user_data/post_users_identifier/
     */
    public function exportByIdentifier(ExportByIdentifierRequest $request, bool $resolveResponse = true): ExportByIdentifierResponse
    {
        return $this->makeRequest('POST', '/users/export/ids', $request, ExportByIdentifierResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/user_data/post_users_segment/
     */
    public function exportBySegment(ExportBySegmentRequest $request, bool $resolveResponse = true): ExportBySegmentResponse
    {
        return $this->makeRequest('POST', '/users/export/segment', $request, ExportBySegmentResponse::class, $resolveResponse);
    }

    /**
     * @see https://www.braze.com/docs/api/endpoints/export/user_data/post_users_global_control_group/
     */
    public function exportByGlobalControlGroup(ExportByGlobalControlGroupRequest $request, bool $resolveResponse = true): ExportByGlobalControlGroupResponse
    {
        return $this->makeRequest('POST', '/users/export/global_control_group', $request, ExportByGlobalControlGroupResponse::class, $resolveResponse);
    }
}
