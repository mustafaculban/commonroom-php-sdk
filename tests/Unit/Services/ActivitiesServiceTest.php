<?php

namespace CommonRoom\Tests\Unit\Services;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Services\ActivitiesService;
use PHPUnit\Framework\TestCase;
use Mockery;

class ActivitiesServiceTest extends TestCase
{
    private $mockHttpClient;
    private $service;

    protected function setUp(): void
    {
        $this->mockHttpClient = Mockery::mock(HttpClient::class);
        $this->service = new ActivitiesService($this->mockHttpClient);
    }

    public function testGetActivityTypes()
    {
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['activityTypes' => ['type1', 'type2']]
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('GET', '/activityTypes', null, [])
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->getActivityTypes();
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testAddUpdateActivityToSource()
    {
        $sourceId = 'test-source';
        $params = ['param' => 'value'];
        $body = ['activity' => 'data'];
        
        $expectedResponse = [
            'statusCode' => 202,
            'body' => ['status' => 'success']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('POST', "/source/{$sourceId}/activity", $body, $params)
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->addUpdateActivityToSource($sourceId, $params, $body);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testCreateUserInputActivity()
    {
        $params = ['param' => 'value'];
        $body = ['activity' => 'data'];
        
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['status' => 'success']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('POST', '/activities', $body, $params)
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->createUserInputActivity($params, $body);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
