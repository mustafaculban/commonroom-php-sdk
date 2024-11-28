<?php
namespace CommonRoom\Services;

use CommonRoom\HttpClient\HttpClient;

class SegmentsService
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function addNoteToSegment($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            '/segments/note',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /segments/note failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    // New methods
    public function getSegments($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'GET',
            '/segments',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /segments failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function getSegmentStatuses($id)
    {
        $response = $this->httpClient->request(
            'GET',
            "/segments/{$id}/status",
            null,
            []
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /segments/{id}/status failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function addContactsToSegment($id, $params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            "/segments/{$id}",
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /segments/{id} failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }
}
?>
