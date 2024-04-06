<?php 

// src/Contracts/TapPaymentInterface.php

namespace Aboodma\TapPaymentPhp\Interfaces;

interface TapPaymentInterface
{
   
    
    
    public function authorizePayment(array $requestData);
    public function getAuthorizationDetails($authorizationId);
    public function createCharge(array $requestData);
}