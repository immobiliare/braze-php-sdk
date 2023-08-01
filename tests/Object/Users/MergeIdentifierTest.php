<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Object\Users\MergeIdentifier;
use ImmobiliareLabs\BrazeSDK\Object\Users\NewUserAlias;
use PHPUnit\Framework\TestCase;

class MergeIdentifierTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(MergeIdentifier $mergeIdentifier): void
    {
        $mergeIdentifier->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoIdentifier(MergeIdentifier $mergeIdentifier): void
    {
        $this->expectException(ValidationException::class);

        $mergeIdentifier->external_id = null;

        $mergeIdentifier->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testBothIdentifier(MergeIdentifier $mergeIdentifier): void
    {
        $this->expectException(ValidationException::class);

        $mergeIdentifier->user_alias = new UserAlias();

        $mergeIdentifier->validate(false);
    }

    public function validProvider(): array
    {
        $mergeIdentifier = new MergeIdentifier();
        $mergeIdentifier->external_id = 'external_id';

        return [
            [$mergeIdentifier],
        ];
    }
}
