<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Response\EmailTemplates\InfoResponse;
use PHPUnit\Framework\TestCase;

class InfoResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new InfoResponse();

        $createdAt  = '2022-01-26 17:43:00';
        $updatedAt  = '2022-01-26 17:48:00';
        $tags = ['tag'];

        $response->fillFromArray([
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
            'tags' => $tags,
        ]);

        $this->assertEquals(new \DateTimeImmutable($createdAt), $response->created_at);
        $this->assertEquals(new \DateTimeImmutable($updatedAt), $response->updated_at);
        $this->assertSame($tags, $response->tags);
    }
}
