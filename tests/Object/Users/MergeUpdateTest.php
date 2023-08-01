<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Object\Users\MergeIdentifier;
use ImmobiliareLabs\BrazeSDK\Object\Users\MergeUpdate;
use ImmobiliareLabs\BrazeSDK\Object\Users\NewUserAlias;
use PHPUnit\Framework\TestCase;

class MergeUpdateTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(MergeUpdate $mergeUpdate): void
    {
        $mergeUpdate->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoIdentifierToMerge(MergeUpdate $mergeUpdate): void
    {
        $this->expectException(ValidationException::class);

        $mergeUpdate->identifier_to_merge = null;

        $mergeUpdate->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoIdentifierToKeep(MergeUpdate $mergeUpdate): void
    {
        $this->expectException(ValidationException::class);

        $mergeUpdate->identifier_to_keep = null;

        $mergeUpdate->validate(false);
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


        return [
            [$mergeUpdate],
        ];
    }
}
