<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use PHPUnit\Framework\TestCase;

class UserAliasTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(UserAlias $userAlias): void
    {
        $userAlias->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLabel(UserAlias $userAlias): void
    {
        $this->expectException(ValidationException::class);

        $userAlias->alias_label = null;

        $userAlias->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoName(UserAlias $userAlias): void
    {
        $this->expectException(ValidationException::class);

        $userAlias->alias_name = null;

        $userAlias->validate(false);
    }

    public function validProvider(): array
    {
        $aliasToIdentify = new UserAlias();
        $aliasToIdentify->alias_label = 'label';
        $aliasToIdentify->alias_name = 'name';

        return [
            [$aliasToIdentify],
        ];
    }
}
