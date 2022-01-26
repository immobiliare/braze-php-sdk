<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Response\ContentBlocks\InfoResponse;
use PHPUnit\Framework\TestCase;

class InfoResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new InfoResponse();

        $createdAt  = '2022-01-26 17:43:00';
        $lastEdited = '2022-01-26 17:48:00';
        $tags = ['tag'];
        $inclusionData = ['inclusion_data'];

        $response->fillFromArray([
            'created_at' => $createdAt,
            'last_edited' => $lastEdited,
            'tags' => $tags,
            'inclusion_data' => $inclusionData
        ]);

        $this->assertEquals(new \DateTimeImmutable($createdAt), $response->created_at);
        $this->assertEquals(new \DateTimeImmutable($lastEdited), $response->last_edited);
        $this->assertSame($tags, $response->tags);
        $this->assertSame($inclusionData, $response->inclusion_data);
    }
}
