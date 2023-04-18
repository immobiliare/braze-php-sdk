<?php

namespace ImmobiliareLabs\BrazeSDK\Test\ClientAdapter;

use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use ImmobiliareLabs\BrazeSDK\Exception\ClientException;
use ImmobiliareLabs\BrazeSDK\Exception\ServerException;
use ImmobiliareLabs\BrazeSDK\Exception\TransportException;
use ImmobiliareLabs\BrazeSDK\Region;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Exception\ClientException as SymfonyClientException;
use Symfony\Component\HttpClient\Exception\ServerException as SymfonyServerException;
use Symfony\Component\HttpClient\Exception\TransportException as SymfonyTransportException;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
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

    public function testMakeRequestWithTransportException(): void
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

    public function testResolveResponseWithTransportException(): void
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

    public function testResolveResponseWithClientException(): void
    {
        $this->expectException(ClientException::class);

        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $httpResponseMock = $this->createMock(ResponseInterface::class);
        $exception = $this->createMock(ClientExceptionInterface::class);

        $httpResponseMock->expects($this->once())
            ->method('getContent')
            ->willThrowException($exception);

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $symfonyAdapter->resolveResponse($httpResponseMock);
    }

    public function testResolveResponseWithServerException(): void
    {
        $this->expectException(ServerException::class);

        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $httpResponseMock = $this->createMock(ResponseInterface::class);
        $exception = $this->createMock(ServerExceptionInterface::class);

        $httpResponseMock->expects($this->once())
            ->method('getContent')
            ->willThrowException($exception);

        $symfonyAdapter = new SymfonyAdapter($httpClientMock);
        $symfonyAdapter->resolveResponse($httpResponseMock);
    }
}
