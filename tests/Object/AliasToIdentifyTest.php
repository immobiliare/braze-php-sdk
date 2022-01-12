<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\AliasToIdentify;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use PHPUnit\Framework\TestCase;

class AliasToIdentifyTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(AliasToIdentify $aliasToIdentify): void
    {
        $aliasToIdentify->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoExternalId(AliasToIdentify $aliasToIdentify): void
    {
        $this->expectException(ValidationException::class);

        $aliasToIdentify->external_id = null;

        $aliasToIdentify->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUserAlias(AliasToIdentify $aliasToIdentify): void
    {
        $this->expectException(ValidationException::class);

        $aliasToIdentify->user_alias = null;

        $aliasToIdentify->validate(false);
    }

    public function validProvider(): array
    {
        $aliasToIdentify = new AliasToIdentify();
        $aliasToIdentify->external_id = 'external_id';
        $aliasToIdentify->user_alias = new UserAlias();
        $aliasToIdentify->user_alias->alias_label = 'label';
        $aliasToIdentify->user_alias->alias_name = 'name';

        return [
            [$aliasToIdentify],
        ];
    }
}
