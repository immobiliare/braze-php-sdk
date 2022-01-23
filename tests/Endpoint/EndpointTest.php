<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\ClientAdapter\ClientAdapterInterface;
use ImmobiliareLabs\BrazeSDK\ClientResolvedResponse;
use ImmobiliareLabs\BrazeSDK\Endpoint\Feed;
use ImmobiliareLabs\BrazeSDK\Endpoint\Users;
use ImmobiliareLabs\BrazeSDK\Exception\NotValidResponseException;
use ImmobiliareLabs\BrazeSDK\Region;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;
use ImmobiliareLabs\BrazeSDK\Request\Feed\ListRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\TrackRequest;
use PHPUnit\Framework\TestCase;

class EndpointTest extends TestCase
{
    /**
     * @dataProvider callsProvider
     */
    public function testMakeRequest(string $endpoint, string $method, BaseRequest $request, int $httpCode, string $responseBody, bool $isSuccess)
    {
        if (null === json_decode($responseBody)) {
            $this->expectException(NotValidResponseException::class);
        }

        $clientAdapter = $this->createMock(ClientAdapterInterface::class);

        $clientAdapter->expects($this->once())
            ->method('makeRequest')
            ->willReturn('not null')
        ;

        $clientAdapter->expects($this->once())
            ->method('resolveResponse')
            ->willReturn(new ClientResolvedResponse($httpCode, $responseBody))
        ;

        $braze = new Braze($clientAdapter, 'api-key', Region::EU01);
        $braze->setValidation(false);

        $endpoint = new $endpoint($braze);

        $response = $endpoint->$method($request, true);

        $this->assertSame($httpCode, $response->getHttpStatusCode());
        $this->assertSame($isSuccess, $response->isSuccess());

        // @todo add tests to check errors
        $response->getFatalError();
        $response->getMinorErrors();
    }

    public function callsProvider(): array
    {
        $trackRequest = new TrackRequest();
        $listRequest = new ListRequest();

        $listRequest->page = 1;

        return [
            [Users::class, 'track', $trackRequest, 201, '{"message": "success"}', true],
            [Feed::class, 'list', $listRequest, 201, '{"message": "success"}', true],
            [Feed::class, 'list', $listRequest, 400, '{"message": "error"}', false],
            [Feed::class, 'list', $listRequest, 201, '{}', false],
            [Feed::class, 'list', $listRequest, 201, '{"message": "ok"}', false],
            [Feed::class, 'list', $listRequest, 500, '', false],
        ];
    }
}
