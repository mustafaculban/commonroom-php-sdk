<?php
namespace CommonRoom\HttpClient;

class HttpClient
{
    private $apiKey;
    private $baseUrl = 'https://api.commonroom.io/community/v1';
    private $timeout = 30;
    private $connectTimeout = 10;
    private $maxRetries = 3;
    private $retryDelay = 1000; // milliseconds
    private $retryableStatusCodes = [408, 429, 500, 502, 503, 504];

    public function __construct(string $apiKey, array $config = [])
    {
        $this->apiKey = $apiKey;
        
        if (isset($config['timeout'])) {
            $this->timeout = $config['timeout'];
        }
        if (isset($config['connect_timeout'])) {
            $this->connectTimeout = $config['connect_timeout'];
        }
        if (isset($config['base_url'])) {
            $this->baseUrl = $config['base_url'];
        }
        if (isset($config['max_retries'])) {
            $this->maxRetries = $config['max_retries'];
        }
        if (isset($config['retry_delay'])) {
            $this->retryDelay = $config['retry_delay'];
        }
    }

    public function request(string $method, string $endpoint, $body = null, array $params = [])
    {
        $attempts = 0;
        $lastException = null;

        while ($attempts < $this->maxRetries) {
            try {
                return $this->makeRequest($method, $endpoint, $body, $params);
            } catch (\Exception $e) {
                $lastException = $e;
                $attempts++;

                // Check if we should retry
                if (!$this->shouldRetry($e, $attempts)) {
                    throw $e;
                }

                // Calculate delay with exponential backoff
                $delay = $this->getRetryDelay($attempts);
                usleep($delay * 1000); // Convert to microseconds
            }
        }

        throw $lastException ?? new \Exception('Request failed after ' . $this->maxRetries . ' attempts');
    }

    private function makeRequest(string $method, string $endpoint, $body = null, array $params = [])
    {
        $url = $this->baseUrl . $endpoint;
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $curl = curl_init();
        
        $headers = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_CONNECTTIMEOUT => $this->connectTimeout,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
        ];

        if ($body !== null && in_array($method, ['POST', 'PUT', 'PATCH'])) {
            $curlOptions[CURLOPT_POSTFIELDS] = json_encode($body);
        }

        curl_setopt_array($curl, $curlOptions);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        if (curl_errno($curl)) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new \Exception('cURL Error: ' . $error);
        }

        curl_close($curl);

        $responseData = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON response from API');
        }

        // Check if status code indicates an error
        if ($httpCode >= 400) {
            throw new \Exception(
                'API Error: ' . ($responseData['message'] ?? 'Unknown error'),
                $httpCode
            );
        }

        return [
            'statusCode' => $httpCode,
            'body' => $responseData
        ];
    }

    private function shouldRetry(\Exception $e, int $attempts): bool
    {
        // Don't retry if we've hit the max attempts
        if ($attempts >= $this->maxRetries) {
            return false;
        }

        // Retry on curl errors
        if (strpos($e->getMessage(), 'cURL Error') !== false) {
            return true;
        }

        // Retry on specific status codes
        if ($e->getCode() && in_array($e->getCode(), $this->retryableStatusCodes)) {
            return true;
        }

        return false;
    }

    private function getRetryDelay(int $attempt): int
    {
        // Exponential backoff with jitter
        $baseDelay = $this->retryDelay * pow(2, $attempt - 1);
        return $baseDelay + rand(0, min(1000, $baseDelay * 0.1));
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }

    public function setConnectTimeout(int $timeout): void
    {
        $this->connectTimeout = $timeout;
    }

    public function setMaxRetries(int $maxRetries): void
    {
        $this->maxRetries = $maxRetries;
    }

    public function setRetryDelay(int $milliseconds): void
    {
        $this->retryDelay = $milliseconds;
    }
}
?>
