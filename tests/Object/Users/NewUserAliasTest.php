<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\NewUserAlias;
use PHPUnit\Framework\TestCase;

class NewUserAliasTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(NewUserAlias $newUserAlias): void
    {
        $newUserAlias->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoExternalID(NewUserAlias $newUserAlias): void
    {
        $this->expectException(ValidationException::class);

        $newUserAlias->external_id = null;

        $newUserAlias->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLabel(NewUserAlias $newUserAlias): void
    {
        $this->expectException(ValidationException::class);

        $newUserAlias->alias_label = null;

        $newUserAlias->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoName(NewUserAlias $newUserAlias): void
    {
        $this->expectException(ValidationException::class);

        $newUserAlias->alias_name = null;

        $newUserAlias->validate(false);
    }

    public function validProvider(): array
    {
        $newUserAlias = new NewUserAlias();
        $newUserAlias->external_id = 'external_id';
        $newUserAlias->alias_label = 'label';
        $newUserAlias->alias_name = 'name';

        return [
            [$newUserAlias],
        ];
    }
}
