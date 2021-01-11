# Laravel Cybersource REST API wrapper

This package wraps the Cybersource Secure Acceptance REST API in a convenient, easy to use package for Laravel.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

## Requirements
* PHP 5.6+
* Enable cURL PHP Extension
* Enable JSON PHP Extension
* Enable PHP_APCU PHP Extension. You will need to download it for your platform (Windows/Linux/Mac)
* [CyberSource Account](https://developer.cybersource.com/api/developer-guides/dita-gettingstarted/registration.html)
* [CyberSource API Keys](https://developer.cybersource.com/api/developer-guides/dita-gettingstarted/registration/createCertSharedKey.html)

## Installation

```
composer require incevio/cybersource-wrapper
```

### If you use laravel < 5.5 you must add this to config\app.php
```
 Providers Array
   Incevio\Cybersource\Providers\CybersourceServiceProvider::class

 Facade Array
   "CybersourcePayments" => Incevio\Cybersource\Facades\CybersourcePaymentsFacade::class

```

## Publishing Configuration

```
php artisan vendor:publish --tag=cybersource-config-file
```

### To set your own sandbox credentials for an API request, configure the following information in cybersource_config.php file:

  * Http

```php
$this->authType = "http_signature";
$this->merchantID = "your_merchant_id";
$this->apiKeyID = "your_key_serial_number";
$this->screteKey = "your_shared_secret";
```
  * Jwt

```php
$this->authType = "jwt";
$this->merchantID = "your_merchant_id";
$this->keyAlias = "your_merchant_id";
$this->keyPass = "your_merchant_id";
$this->keyFilename = "your_merchant_id";
```

### Switching between the sandbox environment and the production environment
CyberSource maintains a complete sandbox environment for testing and development purposes. This sandbox environment is an exact
duplicate of our production environment with the transaction authorization and settlement process simulated. By default, this SDK is
configured to communicate with the sandbox environment. To switch to the production environment, set the appropriate environment
constant.  For example:

```php
// For TESTING use
  $this->runEnv = "cyberSource.environment.SANDBOX";
// For PRODUCTION use
  $this->runEnv = "cyberSource.environment.PRODUCTION";
```

The [API Reference Guide](https://developer.cybersource.com/api/reference/api-reference.html) provides examples of what information is needed for a particular request and how that information would be formatted. Using those examples, you can easily determine what methods would be necessary to include that information in a request
using this SDK.

### Usage REST API Payments

Example usage using Facade:

```
$cliRefInfoArr = [
	"code" => "test_payment"
];

$amountDetailsArr = [
	"totalAmount" => "102.21",
	"currency"    => "USD"
];

$billtoArr = [
	"firstName"          => "John",
	"lastName"           => "Doe",
	"address1"           => "1 Market St",
	"postalCode"         => "94105",
	"locality"           => "san francisco",
	"administrativeArea" => "CA",
	"country"            => "US",
	"phoneNumber"        => "4158880000",
	"company"            => "ABC Company",
	"email"              => "test@cybs.com"
];

$paymentCardInfo = [
	"expirationYear"  => "2031",
	"number"          => "4111111111111111",
	"securityCode"    => "123",
	"expirationMonth" => "12"
];

$response = $response = CybersourcePayments::processPayment($cliRefInfoArr, $amountDetailsArr, $billtoArr, $paymentCardInfo, "true");
```
## Developed By

* **Incevio** - *Web Development Team* - [www.incevio.com](https://www.incevio.com/)

## License

This project is licensed under the MIT License
