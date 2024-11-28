<?php
namespace CommonRoom\Services;

use CommonRoom\HttpClient\HttpClient;

class ActivitiesService
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getActivityTypes($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'GET',
            '/activityTypes',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /activityTypes failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    // New method
    public function addUpdateActivityToSource($destinationSourceId, $params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            "/source/{$destinationSourceId}/activity",
            $body,
            $params
        );

        if ($response['statusCode'] !== 202) {
            throw new \Exception('API call to /source/{destinationSourceId}/activity failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    // New method (Deprecated)
    /**
     * @deprecated This method is deprecated. Use addUpdateActivityToSource() instead.
     */
    public function createUserInputActivity($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            '/activities',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /activities failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }
}
?>
