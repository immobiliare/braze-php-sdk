<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Email;

use ImmobiliareLabs\BrazeSDK\Request\Email\QueryUnsubscribedRequest;
use PHPUnit\Framework\TestCase;

class QueryUnsubscribedRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(QueryUnsubscribedRequest $queryUnsubscribedRequest): void
    {
        $queryUnsubscribedRequest->validate(true);
    }

    public function validProvider(): array
    {
        $queryUnsubscribedRequest1 = new QueryUnsubscribedRequest();


        return [
            [$queryUnsubscribedRequest1]
        ];
    }
}
