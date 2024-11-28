<?php

namespace CommonRoom\Tests\Unit\Services;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Services\ContactsService;
use PHPUnit\Framework\TestCase;
use Mockery;

class ContactsServiceTest extends TestCase
{
    private $mockHttpClient;
    private $service;

    protected function setUp(): void
    {
        $this->mockHttpClient = Mockery::mock(HttpClient::class);
        $this->service = new ContactsService($this->mockHttpClient);
    }

    public function testGetContacts()
    {
        $expectedResponse = [
            'statusCode' => 200,
            'body' => ['contacts' => []]
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with('GET', '/members', null, [])
            ->once()
            ->andReturn($expectedResponse);

        $result = $this->service->getContacts();
        $this->assertEquals($expectedResponse['body'], $result);
    }

    public function testGetContactsThrowsException()
    {
        $this->mockHttpClient
            ->shouldReceive('request')
            ->andThrow(new \Exception('API Error'));

        $this->expectException(\Exception::class);
        $this->service->getContacts();
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
} 