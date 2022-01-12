<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\NewUserAlias;
use ImmobiliareLabs\BrazeSDK\Request\Users\CreateAliasRequest;
use PHPUnit\Framework\TestCase;

class CreateAliasRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(CreateAliasRequest $createAliasRequest): void
    {
        $createAliasRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUserAliases(CreateAliasRequest $createAliasRequest): void
    {
        $this->expectException(ValidationException::class);

        $createAliasRequest->user_aliases = null;

        $createAliasRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValidLoose(CreateAliasRequest $createAliasRequest): void
    {
        foreach ($createAliasRequest->user_aliases as $event) {
            $event->external_id = null;
            break;
        }

        $createAliasRequest->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNotValidLoose(CreateAliasRequest $createAliasRequest): void
    {
        $this->expectException(ValidationException::class);

        foreach ($createAliasRequest->user_aliases as $event) {
            $event->external_id = null;
        }

        $createAliasRequest->validate(false);
    }

    public function validProvider(): array
    {
        $newUserAlias1 = new NewUserAlias();
        $newUserAlias1->external_id = 'external_id';
        $newUserAlias1->alias_name = 'alias_name';
        $newUserAlias1->alias_label = 'alias_label';

        $newUserAlias2 = new NewUserAlias();
        $newUserAlias2->external_id = 'external_id';
        $newUserAlias2->alias_name = 'alias_name';
        $newUserAlias2->alias_label = 'alias_label';

        $createAliasRequest1 = new CreateAliasRequest();
        $createAliasRequest1->user_aliases = [$newUserAlias1, $newUserAlias2];

        return [
            [$createAliasRequest1],
        ];
    }
}
