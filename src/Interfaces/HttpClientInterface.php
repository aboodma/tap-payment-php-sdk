<?php 

// src/Contracts/HttpClientInterface.php

namespace Aboodma\TapPaymentPhp\Interfaces;

interface HttpClientInterface
{
    public function post($url, $data);
    public function get($url, $params = []);
    public function put($url, $data);
}