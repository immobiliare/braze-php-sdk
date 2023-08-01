<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Object\Users\MergeIdentifier;
use ImmobiliareLabs\BrazeSDK\Object\Users\MergeUpdate;
use ImmobiliareLabs\BrazeSDK\Request\Users\IdentifyRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\MergeRequest;
use PHPUnit\Framework\TestCase;

class MergeRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(MergeRequest $mergeRequest): void
    {
        $mergeRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testMergeUpdatesNull(MergeRequest $mergeRequest): void
    {
        $this->expectException(ValidationException::class);

        $mergeRequest->merge_updates = null;

        $mergeRequest->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testMergeUpdatesEmpty(MergeRequest $mergeRequest): void
    {
        $this->expectException(ValidationException::class);

        $mergeRequest->merge_updates = [];

        $mergeRequest->validate(false);
    }

    public function validProvider(): array
    {
        $mergeUpdate = new MergeUpdate();

        $mergeUpdate->identifier_to_merge = new MergeIdentifier();
        $mergeUpdate->identifier_to_merge->user_alias = new UserAlias();
        $mergeUpdate->identifier_to_merge->user_alias->alias_label = 'label';
        $mergeUpdate->identifier_to_merge->user_alias->alias_name = 'name';

        $mergeUpdate->identifier_to_keep = new MergeIdentifier();
        $mergeUpdate->identifier_to_keep->external_id = 'external-id-to-keep';

        $mergeRequest = new MergeRequest();
        $mergeRequest->merge_updates = [$mergeUpdate];

        return [
            [$mergeRequest],
        ];
    }
}
