<?php

require_once __DIR__ . '/vendor/autoload.php';

use Aboodma\TapPaymentPhp\TapPayment;
use Aboodma\TapPaymentPhp\HttpClient;

// Instantiate the HttpClient
$http = new HttpClient();

// API key from Tap Payment
$apiKey = ' API_KEY ';

// Instantiate the TapPayment with the HttpClient and API key
$tapPayment = new TapPayment($http, $apiKey);





// Example usage: Create an authorization
$requestData = [
    'amount' => 1,
    'currency' => 'AED',
    'customer'=>[
        // 'id'=>"cus_TS01A4620230032p4KP1406279",
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'bqWpI@example.com',
        'phone' => '1234567890',
        'address' => '123 Main St',
        'city' => 'Anytown',
        'state' => 'CA',
        'zip' => '12345',
        'country' => 'US',
    ],
    'merchant'=>[
        'id'=>"1234",
    ],
    'source'=>[
        'id'=>"src_card"
    ],
    'customer_initiated' => 'true',
    'redirect'=>[
        'url'=>'https://example.com/redirect',
    ]
    // Add other required parameters as needed based on Tap Payment API documentation
];

$response = $tapPayment->createCharge($requestData);

// Handle the response from Tap Payment API
var_dump($response);

