<?php
/*
*Purpose : calling the JWtoken
*/
namespace Incevio\Cybersource\CybersourceSDK\Authentication\Jwt;
use Incevio\Cybersource\CybersourceSDK\Authentication\PayloadDigest\PayloadDigest as PayloadDigest;
use Incevio\Cybersource\CybersourceSDK\Authentication\Core\TokenGenerator as TokenGenerator;
use Incevio\Cybersource\CybersourceSDK\Authentication\Core\AuthException as AuthException;
use Incevio\Cybersource\CybersourceSDK\Authentication\Jwt\JsonWebTokenHeader as JsonWebTokenHeader;
use Incevio\Cybersource\CybersourceSDK\Authentication\Util\GlobalParameter as GlobalParameter;
use Incevio\Cybersource\CybersourceSDK\Authentication\Log\Logger as Logger;

//calling the interface
class JsonWebTokenGenerator implements TokenGenerator
{
	private static $logger=null;
	/**
     * Constructor
     */
    public function __construct()
    {
        if(self::$logger === null){
        	self::$logger = new Logger(JsonWebTokenGenerator::class);
    	}
    }
	//calling Signature
	public function generateToken($resourcePath, $payloadData, $method, $merchantConfig)
	{

		$date = date("D, d M Y G:i:s ").GlobalParameter::GMT;
		if($method==GlobalParameter::GET || $method==GlobalParameter::DELETE)
		{
			$jwtBody = array("iat"=>$date);

		}
		else if($method==GlobalParameter::POST || $method==GlobalParameter::PUT || $method==GlobalParameter::PATCH)
		{
			$digestObj = new PayloadDigest();
			$digest = $digestObj->generateDigest($payloadData);
			$jwtBody = array("digest"=>$digest,"digestAlgorithm"=>"SHA-256","iat"=>$date);

		}
		else
		{
			$exception = new AuthException(GlobalParameter::INVALID_REQUEST_TYPE_METHOD, 0);
			self::$logger->log($merchantConfig, $exception);
			throw $exception;
		}
		$tokenHeader = $this->accessTokenHeader($jwtBody, $merchantConfig);
		return $tokenHeader;

	}

	public function accessTokenHeader($jwtBody, $merchantConfig){
			$gToken = $this->getJsonWebTokenHeader();
			$generatedToken = $gToken->getJsonWebToken($jwtBody, $merchantConfig);
			return "Bearer ".$generatedToken;
	}

	protected function getJsonWebTokenHeader() {
		return new JsonWebTokenHeader();
	}

}
?>