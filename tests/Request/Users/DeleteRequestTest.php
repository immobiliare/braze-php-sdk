<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Object\Users\NewUserAlias;
use ImmobiliareLabs\BrazeSDK\Request\Users\DeleteRequest;
use PHPUnit\Framework\TestCase;

class DeleteRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(DeleteRequest $deleteRequest): void
    {
        $deleteRequest->validate(true);
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

        $deleteRequest1 = new DeleteRequest();
        $deleteRequest1->user_aliases = [$newUserAlias1, $newUserAlias2];

        return [
            [$deleteRequest1],
        ];
    }
}
