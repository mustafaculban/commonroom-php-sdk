<?php
namespace CommonRoom\Services;

use CommonRoom\HttpClient\HttpClient;

class DefaultService
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function unnamedOperation($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'GET',
            '/api-token-status',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /api-token-status failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

}
?>
