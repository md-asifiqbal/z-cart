<?php
/**
 * ApiException

 */
namespace Incevio\Cybersource\CybersourceSDK\Authentication\Core;

use \Exception;

/**
 * ApiException Class Doc Comment
 *
 * @category Class
 * @package  Incevio\Cybersource\CybersourceSDK
 */
class AuthException extends Exception
{

    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null) {

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }


}


