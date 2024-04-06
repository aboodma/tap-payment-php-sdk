<?php
// src/TapPayment.php

namespace Aboodma\TapPaymentPhp;

use Aboodma\TapPaymentPhp\Interfaces\TapPaymentInterface;
use Aboodma\TapPaymentPhp\Interfaces\HttpClientInterface;
use GuzzleHttp\Exception\RequestException;
class TapPayment implements TapPaymentInterface
{
    protected $httpClient;
    protected $apiKey;

    /**
     * Constructor for the class.
     *
     * @param HttpClientInterface $httpClient description
     * @param datatype $apiKey description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function __construct(HttpClientInterface $httpClient, $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    /**
     * Authorize a payment using the Tap Payment API.
     *
     * @param array $requestData The data required to authorize the payment
     * @throws RequestException If an error occurs during the request
     * @throws \Exception For other unexpected errors
     * @return mixed The response from the Tap Payment API or an error message
     */
    public function authorizePayment(array $requestData): mixed
    {
        try {
            // Set default headers
            $headers = [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            // Make a request to the Tap Payment API to create an authorization
            $response = $this->httpClient->post('https://api.tap.company/v2/authorize/', [
                'json' => $requestData,
                'headers' => $headers,
            ]);

            // Return the response from the Tap Payment API
            return $response;
        } catch (RequestException $e) {
            // If an error occurs during the request
            if ($e->hasResponse()) {
                // If the API returns an error response
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();

                return "Error: HTTP $statusCode - $body";
            } else {
                // If no response is received (e.g., connection timeout)
                return "Error: " . $e->getMessage();
            }
        } catch (\Exception $e) {
            // Other unexpected errors
            return "Error: " . $e->getMessage();
        }
    }
    /**
     * A description of the entire PHP function.
     *
     * @param datatype $paramname description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function getAuthorizationDetails($authorizationId)
    {
        try {
            // Set default headers
            $headers = [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ];

            // Make a request to the Tap Payment API to retrieve authorization details
            $response = $this->httpClient->get("https://api.tap.company/v2/authorize/auth_$authorizationId", [
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

    /**
     * Create a charge using the provided request data.
     *
     * @param array $requestData The data needed to create the charge.
     * @throws RequestException description of exception
     * @return mixed
     */
    public function createCharge(array $requestData)
    {
        try {
            // Set default headers
            $headers = [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            // Make a request to the Tap Payment API to create a charge
            $response = $this->httpClient->post('https://api.tap.company/v2/charges/', [
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