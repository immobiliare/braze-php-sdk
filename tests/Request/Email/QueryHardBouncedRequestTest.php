<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Email;

use ImmobiliareLabs\BrazeSDK\Request\Email\QueryHardBouncedRequest;
use PHPUnit\Framework\TestCase;

class QueryHardBouncedRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(QueryHardBouncedRequest $queryHardBouncedRequest): void
    {
        $queryHardBouncedRequest->validate(true);
    }

    public function validProvider(): array
    {
        $queryHardBouncedRequest1 = new QueryHardBouncedRequest();


        return [
            [$queryHardBouncedRequest1]
        ];
    }
}
