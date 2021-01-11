<?php
/*
Purpose: finding and Convertng request object
*/

namespace Incevio\Cybersource\CybersourceSDK\Authentication\PayloadDigest;
use Incevio\Cybersource\CybersourceSDK\Authentication\Util\GlobalParameter as GlobalParameter;
use Incevio\Cybersource\CybersourceSDK\Authentication\Core\AuthException as AuthException;
use Incevio\Cybersource\CybersourceSDK\Authentication\Log\Logger as Logger;

class PayloadDigest
{
	private static $logger=null;
	/**
     * Constructor
     */
    public function __construct()
    {
        if(self::$logger === null){
        	self::$logger = new Logger(PayloadDigest::class);
    	}
    }

	//Reading the payload Data
	public function getPayloadDigest($filePath, $merchantConfig)
	{
		$authType = $merchantConfig->getAuthenticationType();
		if(file_exists($filePath)){

			$inputData = file_get_contents($filePath);
			$postString = str_replace("\r", "", $inputData);
			return $postString;
		}
		else
		{
			$warning_message = "Input Json is not valid, So its taking Payload Data.";
            trigger_error($warning_message, E_USER_WARNING);//
            self::$logger->log($merchantConfig, $warning_message);

		}

	}
	//Generated Encoded Payload Data
	public function generateDigest($payLoad)
	{

		$utf8EncodedString = utf8_encode($payLoad);
		$digestEncode = hash("sha256", $utf8EncodedString, true);
		return base64_encode($digestEncode);
	}
}


?>