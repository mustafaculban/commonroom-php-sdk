<?php

namespace CommonRoom\Tests\Integration;

use CommonRoom\CommonRoom;
use PHPUnit\Framework\TestCase;

class CommonRoomTest extends TestCase
{
    private $commonRoom;

    protected function setUp(): void
    {
        // Use a test API key or mock environment
        $this->commonRoom = new CommonRoom(getenv('COMMONROOM_TEST_API_KEY') ?: 'test-api-key');
    }

    public function testServicesInitialization()
    {
        $this->assertNotNull($this->commonRoom->activities());
        $this->assertNotNull($this->commonRoom->contacts());
        $this->assertNotNull($this->commonRoom->segments());
        $this->assertNotNull($this->commonRoom->tags());
    }

    public function testApiKeyConfiguration()
    {
        $newApiKey = 'new-test-api-key';
        $this->commonRoom->setApiKey($newApiKey);
        $this->assertEquals($newApiKey, $this->commonRoom->getApiKey());
    }
} 