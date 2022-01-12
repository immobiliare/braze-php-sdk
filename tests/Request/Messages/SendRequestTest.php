<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Messages\SendRequest;
use PHPUnit\Framework\TestCase;

final class SendRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(SendRequest $sendRequest): void
    {
        $sendRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTarget(SendRequest $sendRequest): void
    {
        $this->expectException(ValidationException::class);
        $sendRequest->segment_id = null;
        $sendRequest->external_user_ids = null;
        $sendRequest->audience = null;

        $sendRequest->validate(false);
    }

    public function validProvider(): array
    {
        $sendRequest1 = new SendRequest();
        $sendRequest1->segment_id = 'segment_id';

        $sendRequest2 = new SendRequest();
        $sendRequest2->external_user_ids = ['external_user_id'];

        $sendRequest3 = new SendRequest();
        $sendRequest3->audience = ['AND' => []];

        return [
            [$sendRequest1],
            [$sendRequest2],
            [$sendRequest3],
        ];
    }
}
