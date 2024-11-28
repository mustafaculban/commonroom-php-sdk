<?php
namespace CommonRoom\Services;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Models\ApiToken;

class ApiTokenService
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getApiTokenStatus()
    {
        $response = $this->httpClient->request('GET', '/api-token-status');

        if ($response['statusCode'] !== 200) {
            throw new \Exception('Failed to fetch API token status');
        }

        return ApiToken::fromArray($response['body']);
    }
}
?>
