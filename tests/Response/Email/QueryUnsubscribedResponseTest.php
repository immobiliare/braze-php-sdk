<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Email;

use ImmobiliareLabs\BrazeSDK\Response\Email\QueryUnsubscribedResponse;
use PHPUnit\Framework\TestCase;

class QueryUnsubscribedResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new QueryUnsubscribedResponse();

        $emails = ['email'];

        $response->fillFromArray(['emails' => $emails]);

        $this->assertSame($emails, $response->emails);
    }
}
