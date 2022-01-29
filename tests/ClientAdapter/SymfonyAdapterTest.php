<?php

namespace ImmobiliareLabs\BrazeSDK\Test\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use ImmobiliareLabs\BrazeSDK\Region;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Exception\TransportException as SymfonyTransportException;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class SymfonyAdapterTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSetBaseUri(): void
    {
        $httpClientMock = $this->createMock(HttpClientInterface::class);

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $symfonyAdapter->setBaseURI(Region::EU01);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSetHeaders(): void
    {
        $httpClientMock = $this->createMock(HttpClientInterface::class);

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $symfonyAdapter->setHeaders([]);
    }

    public function testMakeRequest(): void
    {
        $httpClientMock = $this->createMock(HttpClientInterface::class);

        $httpClientMock->expects($this->once())
            ->method('request')
            ->willReturn(new MockResponse());

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $symfonyAdapter->makeRequest('GET', '/path');
    }

    public function testMakeRequestWithException(): void
    {
        $this->expectException(TransportException::class);

        $httpClientMock = $this->createMock(HttpClientInterface::class);

        $httpClientMock->expects($this->once())
            ->method('request')
            ->willThrowException(new SymfonyTransportException());

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $symfonyAdapter->makeRequest('GET', '/path');
    }

    public function testResolveResponse(): void
    {
        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $httpResponseMock = $this->createMock(ResponseInterface::class);

        $httpResponseMock->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(200);

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $resolvedResponse = $symfonyAdapter->resolveResponse($httpResponseMock);

        self::assertSame(200, $resolvedResponse->getStatusCode());
    }

    public function testResolveResponseWithException(): void
    {
        $this->expectException(TransportException::class);

        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $httpResponseMock = $this->createMock(ResponseInterface::class);

        $httpResponseMock->expects($this->once())
            ->method('getContent')
            ->willThrowException(new SymfonyTransportException());

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $symfonyAdapter->resolveResponse($httpResponseMock);
    }
}
