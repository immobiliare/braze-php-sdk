<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Response\ContentBlocks\CreateResponse;
use ImmobiliareLabs\BrazeSDK\Response\ContentBlocks\ListResponse;
use PHPUnit\Framework\TestCase;

class ListResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new ListResponse();

        $createdAt  = '2022-01-26 17:43:00';
        $lastEdited = '2022-01-26 17:48:00';
        $tags = ['tag'];

        $response->fillFromArray(['content_blocks' => [[
            'created_at' => $createdAt,
            'last_edited' => $lastEdited,
            'tags' => $tags,
        ]]]);

        $this->assertCount(1, $response->content_blocks);
    }
}
