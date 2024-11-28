<?php
namespace CommonRoom;

use CommonRoom\HttpClient\HttpClient;
use CommonRoom\Services\ActivitiesService;
use CommonRoom\Services\ApiTokenService;
use CommonRoom\Services\ContactsService;
use CommonRoom\Services\DefaultService;
use CommonRoom\Services\SegmentsService;
use CommonRoom\Services\TagsService;

class CommonRoom {
    private $httpClient;
    private $activities;
    private $apiToken;
    private $contacts;
    private $default;
    private $segments;
    private $tags;

    public function __construct(string $apiKey, array $config = []) {
        $this->httpClient = new HttpClient($apiKey, $config);
        
        // Initialize services
        $this->activities = new ActivitiesService($this->httpClient);
        $this->apiToken = new ApiTokenService($this->httpClient);
        $this->contacts = new ContactsService($this->httpClient);
        $this->default = new DefaultService($this->httpClient);
        $this->segments = new SegmentsService($this->httpClient);
        $this->tags = new TagsService($this->httpClient);
    }

    public function setApiKey(string $apiKey): void {
        $this->httpClient->setApiKey($apiKey);
    }

    public function getApiKey(): string {
        return $this->httpClient->getApiKey();
    }

    public function activities(): ActivitiesService {
        return $this->activities;
    }

    public function apiToken(): ApiTokenService {
        return $this->apiToken;
    }

    public function contacts(): ContactsService {
        return $this->contacts;
    }

    public function segments(): SegmentsService {
        return $this->segments;
    }

    public function tags(): TagsService {
        return $this->tags;
    }
}