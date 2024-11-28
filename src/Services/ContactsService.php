<?php

namespace CommonRoom\Services;

use CommonRoom\HttpClient\HttpClient;

class ContactsService
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getContacts($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'GET',
            '/members',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /members failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    // New methods
    /**
     * @deprecated Use addUpdateUserToSource() instead
     */
    public function createOrUpdateContact($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            '/members/',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /members/ failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function addNoteToContact($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            '/members/note',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /members/note failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function getCustomFields($destinationSourceId = null)
    {
        $params = $destinationSourceId ? ['destinationSourceId' => $destinationSourceId] : [];
        
        $response = $this->httpClient->request(
            'GET',
            '/members/customFields',
            null,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /members/customFields failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    /**
     * @deprecated Use addUpdateUserToSource() instead
     */
    public function setContactCustomFieldValue($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            '/members/customFields',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /members/customFields failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function addTagsToContact($params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            '/members/tags',
            $body,
            $params
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /members/tags failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function getContactByEmail($email)
    {
        $response = $this->httpClient->request(
            'GET',
            "/user/{$email}",
            null,
            []
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to /user/{email} failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function deleteContactByEmail($email)
    {
        $response = $this->httpClient->request(
            'DELETE',
            "/user/{$email}",
            null,
            []
        );

        if ($response['statusCode'] !== 200) {
            throw new \Exception('API call to delete /user/{email} failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }

    public function addUpdateUserToSource($destinationSourceId, $params = [], $body = null)
    {
        $response = $this->httpClient->request(
            'POST',
            "/source/{$destinationSourceId}/user",
            $body,
            $params
        );

        if ($response['statusCode'] !== 202) {
            throw new \Exception('API call to /source/{destinationSourceId}/user failed with status code ' . $response['statusCode']);
        }

        return $response['body'];
    }
}
?>
