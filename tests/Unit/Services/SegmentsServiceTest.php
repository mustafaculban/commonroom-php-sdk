<?php

namespace CommonRoom\Tests\Unit\Services;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Services\SegmentsService;
use PHPUnit\Framework\TestCase;
use Mockery;

class SegmentsServiceTest extends TestCase
{
    private $mockHttpClient;
    private $service;

    protected function setUp(): void
    {
        $this->mockHttpClient = Mockery::mock(HttpClient::class);
        $this->service = new SegmentsService($this->mockHttpClient);
    }

    public function testGetSegments()
    {
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['segments' => []]
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('GET', '/segments', null, [])
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->getSegments();
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testAddNoteToSegment()
    {
        $params = ['param' => 'value'];
        $body = ['note' => 'Test note'];
        
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['status' => 'success']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('POST', '/segments/note', $body, $params)
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->addNoteToSegment($params, $body);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testGetSegmentStatuses()
    {
        $segmentId = 'test-id';
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['statuses' => []]
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('GET', "/segments/{$segmentId}/status", null, [])
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->getSegmentStatuses($segmentId);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testAddContactsToSegment()
    {
        $segmentId = 'test-id';
        $params = ['param' => 'value'];
        $body = ['contacts' => []];
        
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['status' => 'success']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('POST', "/segments/{$segmentId}", $body, $params)
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->addContactsToSegment($segmentId, $params, $body);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
} 