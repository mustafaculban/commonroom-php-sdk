<?php
namespace CommonRoom\Services;

use CommonRoom\HttpClient\HttpClient;

class TagsService
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function deleteTag($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'DELETE',
            '/tags/{id}',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /tags/{id} failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    // New methods
    public function listTags($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'GET',
            '/tags',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /tags failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function createTag($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            '/tags',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /tags failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function getTag($id)
    {
        $response = $this->httpClient->request(
            'GET',
            "/tags/{$id}",
            null,
            []
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /tags/{id} failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function updateTag($id, $params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            "/tags/{$id}",
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /tags/{id} failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }
}
?>
