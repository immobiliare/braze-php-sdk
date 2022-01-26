<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Response\EmailTemplates\CreateResponse;
use PHPUnit\Framework\TestCase;

class CreateResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new CreateResponse();

        $createdAt = '2022-01-26 17:43:00';

        $response->fillFromArray(['created_at' => $createdAt]);

        $this->assertEquals(new \DateTimeImmutable($createdAt), $response->created_at);
    }
}
