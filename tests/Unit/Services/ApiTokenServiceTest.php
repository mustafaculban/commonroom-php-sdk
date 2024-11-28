<?php

namespace CommonRoom\Tests\Unit\Services;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Services\ApiTokenService;
use CommonRoom\Models\ApiToken;
use PHPUnit\Framework\TestCase;
use Mockery;

class ApiTokenServiceTest extends TestCase
{
    private $mockHttpClient;
    private $service;

    protected function setUp(): void
    {
        $this->mockHttpClient = Mockery::mock(HttpClient::class);
        $this->service = new ApiTokenService($this->mockHttpClient);
    }

    public function testGetApiTokenStatus()
    {
        $responseData = [
            'jti' => 'test-jti',
            'communityName' => 'Test Community',
            'communityId' => 'test-id'
        ];

        $expectedResponse = [
            'statusCode' => 200,
            'body' => $responseData
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('GET', '/api-token-status')
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->getApiTokenStatus();
        $this->assertInstanceOf(ApiToken::class, $result);
        $this->assertEquals($responseData['jti'], $result->jti);
        $this->assertEquals($responseData['communityName'], $result->communityName);
        $this->assertEquals($responseData['communityId'], $result->communityId);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
} 