<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use DateTimeImmutable;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Event;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Object\UserAttributes;
use PHPUnit\Framework\TestCase;

final class UserAttributesTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(UserAttributes $userAttributes): void
    {
        $userAttributes->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUserIdentifier(UserAttributes $userAttributes): void
    {
        $this->expectException(ValidationException::class);
        $userAttributes->external_id = null;
        $userAttributes->user_alias = null;
        $userAttributes->braze_id = null;

        $userAttributes->validate(false);
    }

    public function testJsonSerialize(): void
    {
        $userAttributes = new UserAttributes();
        $userAttributes->dob = new DateTimeImmutable();

        $serialized = $userAttributes->jsonSerialize();

        $this->assertSame($userAttributes->dob->format('Y-m-d'), $serialized['dob']);
    }

    public function validProvider(): array
    {
        $userAttributes1 = new UserAttributes();
        $userAttributes1->external_id = 'external_id';

        $userAttributes2 = new UserAttributes();
        $userAttributes2->user_alias = new UserAlias();
        $userAttributes2->user_alias->alias_name = 'alias_name';
        $userAttributes2->user_alias->alias_label = 'alias_label';

        $userAttributes3 = new UserAttributes();
        $userAttributes3->braze_id = 'braze_id';

        return [
            [$userAttributes1],
            [$userAttributes2],
            [$userAttributes3],
        ];
    }
}
