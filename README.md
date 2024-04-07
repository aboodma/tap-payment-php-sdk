
# Tap Payment PHP SDK

This is a PHP SDK for integrating with the Tap Payment API. It provides convenient methods for interacting with Tap Payment endpoints, such as creating charges, authorizing payments, and managing customers.

## Requirements

- PHP >= 8.0
- Composer

## Installation

You can install the SDK via Composer. Run the following command in your project directory:


    composer require aboodma/tap-payment-php` 


## Usage

    <?php
    
    // Instantiate the TapPayment SDK
    use Aboodma\TapPaymentPhp\TapPayment;
    use Aboodma\TapPaymentPhp\HttpClient;
    
    $http = new HttpClient();
    $apiKey = 'YOUR_API_KEY_HERE';
    $tapPayment = new TapPayment($http, $apiKey);
    
    // Example: Create a customer
    $requestData = [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        // Add other required parameters
    ];
    
    $response = $tapPayment->createCustomer($requestData);
    
    // Handle the response
    var_dump($response);` 

## Documentation

For more details on how to use each method, please refer to the documentation.

## Contributing

Contributions are welcome! 

## License

This project is licensed under the MIT License - see the LICENSE file for details.
