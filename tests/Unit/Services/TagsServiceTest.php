<?php

namespace CommonRoom\Tests\Unit\Services;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Services\TagsService;
use PHPUnit\Framework\TestCase;
use Mockery;

class TagsServiceTest extends TestCase
{
    private $mockHttpClient;
    private $service;

    protected function setUp(): void
    {
        $this->mockHttpClient = Mockery::mock(HttpClient::class);
        $this->service = new TagsService($this->mockHttpClient);
    }

    public function testListTags()
    {
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['tags' => []]
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('GET', '/tags', null, [])
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->listTags();
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testCreateTag()
    {
        $params = [];
        $body = ['name' => 'Test Tag', 'description' => 'Test Description'];
        
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['id' => 'new-tag-id']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('POST', '/tags', $body, $params)
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->createTag($params, $body);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testGetTag()
    {
        $tagId = 'test-id';
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['id' => $tagId, 'name' => 'Test Tag']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('GET', "/tags/{$tagId}", null, [])
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->getTag($tagId);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testUpdateTag()
    {
        $tagId = 'test-id';
        $params = [];
        $body = ['name' => 'Updated Tag'];
        
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['status' => 'success']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('POST', "/tags/{$tagId}", $body, $params)
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->updateTag($tagId, $params, $body);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testDeleteTag()
    {
        $params = ['id' => 'test-id'];
        
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['status' => 'success']
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('DELETE', '/tags/{id}', null, $params)
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->deleteTag($params);
        $this->assertEquals($expectedResponse['body'], $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
} 