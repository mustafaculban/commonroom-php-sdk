<?php

namespace CommonRoom\Tests\Unit\HttpClient;

use CommonRoom\HttpClient\HttpClient;
use PHPUnit\Framework\TestCase;
use Mockery;

class HttpClientTest extends TestCase
{
    private $httpClient;

    protected function setUp(): void
    {
        $this->httpClient = new HttpClient('test-api-key');
    }

    public function testConstructorSetsApiKey()
    {
        $this->assertEquals('test-api-key', $this->httpClient->getApiKey());
    }

    public function testSetApiKey()
    {
        $this->httpClient->setApiKey('new-api-key');
        $this->assertEquals('new-api-key', $this->httpClient->getApiKey());
    }

    public function testRetryConfiguration()
    {
        $httpClient = new HttpClient('test-api-key', [
            'max_retries' => 5,
            'retry_delay' => 2000
        ]);

        $this->assertInstanceOf(HttpClient::class, $httpClient);
    }

    public function testRequestThrowsExceptionOnInvalidJson()
    {
        // Mock curl_exec to return invalid JSON
        $this->mockCurlFunction('curl_exec', 'invalid-json');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('API Error: Unknown error');

        $this->httpClient->request('GET', '/test-endpoint');
    }

    private function mockCurlFunction($function, $return)
    {
        // Implementation depends on your testing approach
        // You might need to use a library like mockery or php-mock
        // use mockery to give mock response for given function (in this case it is curl_exec)
        $mock = Mockery::mock('alias:curl_exec');
        $mock->shouldReceive($function)->andReturn($return);
    }
}