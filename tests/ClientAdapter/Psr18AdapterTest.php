<?php

namespace ImmobiliareLabs\BrazeSDK\Test\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientAdapter\Psr18Adapter;
use ImmobiliareLabs\BrazeSDK\Exception\ClientException;
use ImmobiliareLabs\BrazeSDK\Exception\NotValidBaseURIException;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use ImmobiliareLabs\BrazeSDK\Region;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

class Psr18AdapterTest extends TestCase
{
    private ClientInterface|MockObject $httpClientMock;

    private UriFactoryInterface|MockObject $uriFactoryMock;

    private RequestFactoryInterface|MockObject $requestFactoryMock;

    private Psr18Adapter|MockObject $psr18Adapter;

    public function setUp(): void
    {
        parent::setUp();

        $this->httpClientMock = $this->createMock(ClientInterface::class);
        $this->uriFactoryMock = $this->createMock(UriFactoryInterface::class);
        $this->requestFactoryMock = $this->createMock(RequestFactoryInterface::class);
        $streamFactoryMock = $this->createMock(StreamFactoryInterface::class);

        $this->psr18Adapter = new Psr18Adapter($this->httpClientMock, $this->uriFactoryMock, $this->requestFactoryMock, $streamFactoryMock);
    }

    public function testSetBaseUri(): void
    {
        $uriMock = $this->createMock(UriInterface::class);

        $this->uriFactoryMock->expects(self::once())
            ->method('createUri')
            ->willReturn($uriMock);

        $uriMock->expects(self::once())
            ->method('withScheme')
            ->willReturn($uriMock);

        $uriMock->expects(self::once())
            ->method('withHost')
            ->willReturn($uriMock);

        $this->psr18Adapter->setBaseURI(Region::EU01);
    }

    public function testSetBaseUriWithException(): void
    {
        $this->expectException(NotValidBaseURIException::class);
        
        $this->psr18Adapter->setBaseURI('not_an_url');
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSetHeaders(): void
    {
        $this->psr18Adapter->setHeaders(['Content-Type' => 'application/json']);
    }

    public function testMakeRequest(): void
    {
        $request = $this->createMock(RequestInterface::class);

        $this->testSetBaseUri();
        $this->testSetHeaders();

        $this->httpClientMock->expects($this->once())
            ->method('sendRequest');

        $this->requestFactoryMock->expects($this->once())
            ->method('createRequest')
            ->willReturn($request);

        $request->expects($this->once())
            ->method('withHeader')
            ->willReturn($request);

        $request->expects($this->once())
            ->method('withBody')
            ->willReturn($request);

        $this->psr18Adapter->makeRequest('GET', '/path', '{}');
    }

    public function testMakeRequestWithClientException(): void
    {
        $this->expectException(ClientException::class);

        $exception = $this->createMock(ClientExceptionInterface::class);

        $this->testSetBaseUri();

        $this->httpClientMock->expects($this->once())
            ->method('sendRequest')
            ->willThrowException($exception);

        $this->psr18Adapter->makeRequest('GET', '/path');
    }

    public function testMakeRequestWithNetworkException(): void
    {
        $this->expectException(TransportException::class);

        $exception = $this->createMock(NetworkExceptionInterface::class);

        $this->testSetBaseUri();

        $this->httpClientMock->expects($this->once())
            ->method('sendRequest')
            ->willThrowException($exception);

        $this->psr18Adapter->makeRequest('GET', '/path');
    }

    public function testResolveResponse(): void
    {
        $httpResponseMock = $this->createMock(ResponseInterface::class);

        $httpResponseMock->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(200);

        $httpResponseMock->expects($this->once())
            ->method('getBody')
            ->willReturn('');

        $resolvedResponse = $this->psr18Adapter->resolveResponse($httpResponseMock);

        self::assertSame(200, $resolvedResponse->getStatusCode());
    }
}
