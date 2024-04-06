<?php

// src/CustomerManager.php

namespace Aboodma\TapPaymentPhp;

use Aboodma\TapPaymentPhp\Interfaces\CustomerManagerInterface;
use Aboodma\TapPaymentPhp\Interfaces\HttpClientInterface;
use GuzzleHttp\Exception\RequestException;

class CustomerManager implements CustomerManagerInterface
{
    protected $httpClient;
    protected $apiKey;

    public function __construct(HttpClientInterface $httpClient, $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    public function createCustomer(array $requestData)
    {
        try {
            // Set default headers
            $headers = [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            // Make a request to the Tap Payment API to create a customer
            $response = $this->httpClient->post('https://api.tap.company/v2/customers', [
                'json' => $requestData,
                'headers' => $headers,
            ]);

            // Return the response from the Tap Payment API
            return $response;
        } catch (RequestException $e) {
            // Handle request exception
            return $e->getMessage();
        } catch (\Exception $e) {
            // Other unexpected errors
            return $e->getMessage();
        }
    }
}
