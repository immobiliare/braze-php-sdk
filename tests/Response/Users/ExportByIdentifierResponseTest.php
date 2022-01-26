<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\Users\ExportByIdentifierResponse;
use PHPUnit\Framework\TestCase;

class ExportByIdentifierResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new ExportByIdentifierResponse();

        $users = ['user'];
        $invalidUserIds = ['invalid_user_id'];

        $response->fillFromArray([
            'users' => $users,
            'invalid_user_ids' => $invalidUserIds,
        ]);

        $this->assertSame($users, $response->users);
        $this->assertSame($invalidUserIds, $response->invalid_user_ids);
    }
}
