<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\ClientAdapter\ClientAdapterInterface;
use ImmobiliareLabs\BrazeSDK\ClientResolvedResponse;
use ImmobiliareLabs\BrazeSDK\Endpoint\Feed;
use ImmobiliareLabs\BrazeSDK\Endpoint\Users;
use ImmobiliareLabs\BrazeSDK\Exception\NotValidResponseException;
use ImmobiliareLabs\BrazeSDK\Object\ValueObject\RateLimit;
use ImmobiliareLabs\BrazeSDK\Region;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;
use ImmobiliareLabs\BrazeSDK\Request\Feed\ListRequest;
use ImmobiliareLabs\BrazeSDK\Request\Sessions\AnalyticsRequest;
use ImmobiliareLabs\BrazeSDK\Request\Users\TrackRequest;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EndpointTest extends TestCase
{
    protected ClientAdapterInterface|MockObject $clientAdapter;

    protected Braze|MockObject $braze;

    public function setUp(): void
    {
        parent::setUp();

        $this->clientAdapter = $this->createMock(ClientAdapterInterface::class);

        $this->clientAdapter->expects($this->once())
            ->method('makeRequest')
            ->willReturn('not null')
        ;

        $this->braze = new Braze($this->clientAdapter, 'api-key', Region::EU01);
        $this->braze->setValidation(false);
    }

    /**
     * @dataProvider callsProvider
     */
    public function testMakeRequest(
        string      $endpointName,
        string      $method,
        BaseRequest $request,
        int         $httpCode,
        string      $responseBody,
        array       $responseHeaders,
        bool        $isSuccess
    ) {
        if (null === json_decode($responseBody)) {
            $this->expectException(NotValidResponseException::class);
        }

        $this->clientAdapter->expects($this->once())
            ->method('resolveResponse')
            ->willReturn(new ClientResolvedResponse($httpCode, $responseBody, $responseHeaders))
        ;

        $endpoint = new $endpointName($this->braze);

        $response = $endpoint->$method($request, true);

        $this->assertSame($httpCode, $response->getHttpStatusCode());
        $this->assertSame($isSuccess, $response->isSuccess());
        $this->assertInstanceOf(RateLimit::class, $response->getRateLimit());

        if (429 === $httpCode) {
            $this->assertSame(0, $response->getRateLimit()->remaining);
        }
        if (429 > $httpCode) {
            $this->assertGreaterThan(1, $response->getRateLimit()->remaining);
        }

        // @todo add tests to check errors
        $response->getFatalError();
        $response->getMinorErrors();
    }

    public function callsProvider(): array
    {
        $trackRequest = new TrackRequest();
        $listRequest = new ListRequest();

        $listRequest->page = 1;

        $rateLimit = ['x-ratelimit-limit' => [0 => '250000'], 'x-ratelimit-remaining' => [0 => '218720'], 'x-ratelimit-reset' => [0 => '2128']];
        $rateLimitReached = ['x-ratelimit-limit' => [0 => '250000'], 'x-ratelimit-remaining' => [0 => '0'], 'x-ratelimit-reset' => [0 => '212']];

        return [
            [Users::class, 'track', $trackRequest, 201, '{"message": "success"}', $rateLimit, true],
            [Feed::class, 'list', $listRequest, 201, '{"message": "success"}', $rateLimit, true],
            [Feed::class, 'list', $listRequest, 400, '{"message": "error"}', $rateLimit, false],
            [Feed::class, 'list', $listRequest, 201, '{}', $rateLimit, false],
            [Feed::class, 'list', $listRequest, 201, '{"message": "ok"}', $rateLimit, false],
            [Feed::class, 'list', $listRequest, 500, '', [], false],
            [Feed::class, 'list', $listRequest, 429, '{}', $rateLimitReached, false],
        ];
    }
}
