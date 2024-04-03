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

    /**
     * @dataProvider validEmailIdentifierProvider
     * @doesNotPerformAssertions
     */
    public function testValidEmailIdentifier(MergeIdentifier $mergeIdentifier): void
    {
        $mergeIdentifier->validate(true);
    }

    public function validEmailIdentifierProvider(): array
    {
        $mergeIdentifier = new MergeIdentifier();
        $mergeIdentifier->email = 'email@email.it';
        $mergeIdentifier->prioritization = ['unidentified', 'most_recently_updated'];

        return [
            [$mergeIdentifier],
        ];
    }

    /**
     * @dataProvider invalidEmailIdentifierProvider
     */
    public function testInvalidEmailIdentifier(MergeIdentifier $mergeIdentifier): void
    {
        $this->expectException(ValidationException::class);

        $mergeIdentifier->validate(false);
    }

    public function invalidEmailIdentifierProvider(): array
    {
        $mergeIdentifier1 = new MergeIdentifier();
        $mergeIdentifier1->email = 'email@email.it';

        $mergeIdentifier2 = new MergeIdentifier();
        $mergeIdentifier2->email = 'email@email.it';
        $mergeIdentifier2->prioritization = ['email'];

        $mergeIdentifier3 = new MergeIdentifier();
        $mergeIdentifier3->email = 'email@email.it';
        $mergeIdentifier3->prioritization = ['identified', 'unidentified'];

        return [
            [$mergeIdentifier1],
            [$mergeIdentifier2],
            [$mergeIdentifier3],
        ];
    }
}
