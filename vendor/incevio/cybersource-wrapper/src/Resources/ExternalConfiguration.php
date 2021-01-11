<?php
/*
* Purpose : passing Authentication config object to the configuration
*/
namespace Incevio\Cybersource\Resources;

// require_once __DIR__. DIRECTORY_SEPARATOR .'../vendor/autoload.php';


class ExternalConfiguration
{
    private $config_exist = false;

    private function getConfig($key, $default) {
        if (! $this->config_exist) {
            return $default;
        }

        return config('cybersource_config.' . $key, $default);
    }
    //initialize variable on constructor
    function __construct()
    {
        $this->config_exist = function_exists('config');
        $this->authType = $this->getConfig("authType", "jwt");//http_signature/jwt
        $this->enableLog = true;
        $this->logSize = "1048576";
        $this->logFile = "Log";
        $this->logFilename = "Cybs.log";
        $this->merchantID = $this->getConfig("merchantID", "testrest");"testrest";
        $this->apiKeyID = $this->getConfig("apiKeyID", "08c94330-f618-42a3-b09d-e1e43be5efda");
        $this->secretKey = $this->getConfig("secretKey", "246EcSuttY8mUI034MCVpVzPIT6+ulaHhRjFFp84VEk=");
        $this->keyAlias = $this->getConfig("keyAlias", "testrest");
        $this->keyPass = $this->getConfig("keyPass", "testrest");
        $this->keyFilename = $this->getConfig("keyFilename", "testrest");
        $this->keyDirectory = $this->getConfig("keyDirectory", 'Resources' . DIRECTORY_SEPARATOR);
        $this->runEnv = $this->getConfig("runEnv", "cyberSource.environment.SANDBOX");
        $this->merchantConfigObject();
    }

    //creating merchant config object
    function merchantConfigObject()
    {
        $config = new \Incevio\Cybersource\CybersourceSDK\Authentication\Core\MerchantConfiguration();
        if(is_bool($this->enableLog))
              $confiData = $config->setDebug($this->enableLog);

        $confiData = $config->setLogSize(trim($this->logSize));
        $confiData = $config->setDebugFile(trim(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . $this->logFile));
		$confiData = $config->setLogFileName(trim($this->logFilename));
        $confiData = $config->setauthenticationType(strtoupper(trim($this->authType)));
        $confiData = $config->setMerchantID(trim($this->merchantID));
        $confiData = $config->setApiKeyID($this->apiKeyID);
        $confiData = $config->setSecretKey($this->secretKey);
        $confiData = $config->setKeyFileName(trim($this->keyFilename));
        $confiData = $config->setKeyAlias($this->keyAlias);
        $confiData = $config->setKeyPassword($this->keyPass);
        $confiData = $config->setKeysDirectory(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . $this->keyDirectory);
        $confiData = $config->setRunEnvironment($this->runEnv);
        $config->validateMerchantData($confiData);
        return $config;
    }

    function ConnectionHost()
    {
        $merchantConfig = $this->merchantConfigObject();
        $config = new \Incevio\Cybersource\CybersourceSDK\Configuration;
        $config = $config->setHost($merchantConfig->getHost());
        $config = $config->setDebug($merchantConfig->getDebug());
        $config = $config->setDebugFile($merchantConfig->getDebugFile() . DIRECTORY_SEPARATOR . $merchantConfig->getLogFileName());
        return $config;
    }

    function FutureDate($format){
            if($format){
                    $rdate = date("Y-m-d",strtotime("+7 days"));
                    $retDate = date($format,strtotime($rdate));
            }
            else{
                    $retDate = date("Y-m",strtotime("+7 days"));
            }
            echo $retDate;
            return $retDate;
    }

    function CallTestLogging($testId, $apiName, $responseMessage){
            $runtime = date('d-m-Y H:i:s');
            $file = fopen("./CSV_Files/TestReport/TestResults.csv", "a+");
            fputcsv($file, array($testId, $runtime, $apiName, $responseMessage));
            fclose($file);
    }

    function downloadReport($downloadData, $fileName){
            $filePathName = __DIR__. DIRECTORY_SEPARATOR .$fileName;
            $file = fopen($filePathName, "w");
            fwrite($file, $downloadData);
            fclose($file);
            return __DIR__.'\\'.$fileName;
    }
}

?>
