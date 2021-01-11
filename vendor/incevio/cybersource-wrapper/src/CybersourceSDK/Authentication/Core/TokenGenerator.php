<?php

namespace Incevio\Cybersource\CybersourceSDK\Authentication\Core;

interface TokenGenerator
{
    public function generateToken($resourcePath, $payloadData, $method, $merchantConfig);
}

?>