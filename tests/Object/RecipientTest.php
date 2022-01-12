<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\AliasToIdentify;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use PHPUnit\Framework\TestCase;

class RecipientTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(Recipient $recipient): void
    {
        $recipient->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUser(Recipient $recipient): void
    {
        $this->expectException(ValidationException::class);

        $recipient->external_user_id = null;
        $recipient->user_alias = null;

        $recipient->validate(false);
    }

    public function validProvider(): array
    {
        $recipient1 = new Recipient();
        $recipient1->external_user_id = 'external_id';

        $recipient2 = new Recipient();
        $recipient2->user_alias = new UserAlias();
        $recipient2->user_alias->alias_label = 'label';
        $recipient2->user_alias->alias_name = 'name';

        return [
            [$recipient1],
            [$recipient2],
        ];
    }
}
