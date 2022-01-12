<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\AliasToIdentify;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Request\Users\IdentifyRequest;
use PHPUnit\Framework\TestCase;

class IdentifyRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(IdentifyRequest $identifyRequest): void
    {
        $identifyRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUserAliases(IdentifyRequest $identifyRequest): void
    {
        $this->expectException(ValidationException::class);

        $identifyRequest->aliases_to_identify = null;

        $identifyRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValidLoose(IdentifyRequest $identifyRequest): void
    {
        foreach ($identifyRequest->aliases_to_identify as $event) {
            $event->external_id = null;
            break;
        }

        $identifyRequest->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNotValidLoose(IdentifyRequest $identifyRequest): void
    {
        $this->expectException(ValidationException::class);

        foreach ($identifyRequest->aliases_to_identify as $event) {
            $event->external_id = null;
        }

        $identifyRequest->validate(false);
    }

    public function validProvider(): array
    {
        $aliasToIdentify1 = new AliasToIdentify();
        $aliasToIdentify1->external_id = 'external_id';
        $aliasToIdentify1->user_alias = new UserAlias();
        $aliasToIdentify1->user_alias->alias_name = 'alias_name';
        $aliasToIdentify1->user_alias->alias_label = 'alias_label';

        $aliasToIdentify2 = new AliasToIdentify();
        $aliasToIdentify2->external_id = 'external_id';
        $aliasToIdentify2->user_alias = new UserAlias();
        $aliasToIdentify2->user_alias->alias_name = 'alias_name';
        $aliasToIdentify2->user_alias->alias_label = 'alias_label';

        $identifyRequest1 = new IdentifyRequest();
        $identifyRequest1->aliases_to_identify = [$aliasToIdentify1, $aliasToIdentify2];

        return [
            [$identifyRequest1],
        ];
    }
}
