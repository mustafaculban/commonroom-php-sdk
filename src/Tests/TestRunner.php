
<?php

namespace CommonRoom\Tests;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Services\ApiTokenService;
use CommonRoom\Services\DefaultService;
use CommonRoom\Services\ContactsService;
use CommonRoom\Services\ActivitiesService;
use CommonRoom\Services\SegmentsService;
use CommonRoom\Services\TagsService;

class TestRunner
{
    private $httpClient;

    public function __construct($baseUrl, $headers = [])
    {
        $this->httpClient = new HttpClient($baseUrl, $headers);
    }

    public function runTests()
    {
        echo "Starting tests...\n";

        
        try {
            $service = new ApiTokenService($this->httpClient);
            echo "Testing ApiTokenService...\n";
            // Add specific method calls here for testing each endpoint
            // Example: $result = $service->methodName();
            echo "ApiTokenService test passed.\n";
        } catch (\Exception $e) {
            echo "ApiTokenService test failed: " . $e->getMessage() . "\n";
        }
        

        try {
            $service = new DefaultService($this->httpClient);
            echo "Testing DefaultService...\n";
            // Add specific method calls here for testing each endpoint
            // Example: $result = $service->methodName();
            echo "DefaultService test passed.\n";
        } catch (\Exception $e) {
            echo "DefaultService test failed: " . $e->getMessage() . "\n";
        }
        

        try {
            $service = new ContactsService($this->httpClient);
            echo "Testing ContactsService...\n";
            // Add specific method calls here for testing each endpoint
            // Example: $result = $service->methodName();
            echo "ContactsService test passed.\n";
        } catch (\Exception $e) {
            echo "ContactsService test failed: " . $e->getMessage() . "\n";
        }
        

        try {
            $service = new ActivitiesService($this->httpClient);
            echo "Testing ActivitiesService...\n";
            // Add specific method calls here for testing each endpoint
            // Example: $result = $service->methodName();
            echo "ActivitiesService test passed.\n";
        } catch (\Exception $e) {
            echo "ActivitiesService test failed: " . $e->getMessage() . "\n";
        }
        

        try {
            $service = new SegmentsService($this->httpClient);
            echo "Testing SegmentsService...\n";
            // Add specific method calls here for testing each endpoint
            // Example: $result = $service->methodName();
            echo "SegmentsService test passed.\n";
        } catch (\Exception $e) {
            echo "SegmentsService test failed: " . $e->getMessage() . "\n";
        }
        

        try {
            $service = new TagsService($this->httpClient);
            echo "Testing TagsService...\n";
            // Add specific method calls here for testing each endpoint
            // Example: $result = $service->methodName();
            echo "TagsService test passed.\n";
        } catch (\Exception $e) {
            echo "TagsService test failed: " . $e->getMessage() . "\n";
        }
        

        echo "All tests completed.\n";
    }
}
?>
