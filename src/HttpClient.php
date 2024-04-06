<?php

// src/HttpClient.php

namespace Aboodma\TapPaymentPhp;

use Aboodma\TapPaymentPhp\Interfaces\HttpClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient implements HttpClientInterface
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function post($url, $data)
    {
        try {
            $response = $this->client->post($url,$data);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            // Handle request exception
            return $e->getMessage();
        }
    }

    public function get($url, $params = [])
    {
        try {
            $response = $this->client->get($url, [
                'query' => $params
            ]);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            // Handle request exception
            return $e->getMessage();
        }
    }

    public function put($url, $data)
    {
        try {
            $response = $this->client->put($url, [
                'json' => $data
            ]);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            // Handle request exception
            return $e->getMessage();
        }
    }
}