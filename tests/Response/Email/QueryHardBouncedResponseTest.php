<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Email;

use ImmobiliareLabs\BrazeSDK\Response\Email\QueryHardBouncedResponse;
use PHPUnit\Framework\TestCase;

class QueryHardBouncedResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new QueryHardBouncedResponse();

        $emails = ['email'];

        $response->fillFromArray(['emails' => $emails]);

        $this->assertSame($emails, $response->emails);
    }
}
