<?php

namespace Aboodma\TapPaymentPhp\Interfaces;

interface CustomerManagerInterface
{
    public function createCustomer(array $requestData);
}