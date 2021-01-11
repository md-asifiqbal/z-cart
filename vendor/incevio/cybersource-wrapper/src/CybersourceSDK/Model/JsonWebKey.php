<?php
/**
 * JsonWebKey
 *
 * PHP version 5
 *
 * @category Class
 * @package  Incevio\Cybersource\CybersourceSDK
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Incevio\Cybersource\CybersourceSDK Merged Spec
 *
 * All Incevio\Cybersource\CybersourceSDK API specs merged together. These are available at https://developer.cybersource.com/api/reference/api-reference.html
 *
 * OpenAPI spec version: 0.0.1
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Incevio\Cybersource\CybersourceSDK\Model;

use \ArrayAccess;

/**
 * JsonWebKey Class Doc Comment
 *
 * @category    Class
 * @description The public key in JSON Web Key (JWK) format. This format is useful for client side encryption in JavaScript based implementations.
 * @package     Incevio\Cybersource\CybersourceSDK
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class JsonWebKey implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'JsonWebKey';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'kty' => 'string',
        'use' => 'string',
        'kid' => 'string',
        'n' => 'string',
        'e' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'kty' => null,
        'use' => null,
        'kid' => null,
        'n' => null,
        'e' => null
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'kty' => 'kty',
        'use' => 'use',
        'kid' => 'kid',
        'n' => 'n',
        'e' => 'e'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'kty' => 'setKty',
        'use' => 'setUse',
        'kid' => 'setKid',
        'n' => 'setN',
        'e' => 'setE'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'kty' => 'getKty',
        'use' => 'getUse',
        'kid' => 'getKid',
        'n' => 'getN',
        'e' => 'getE'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }





    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['kty'] = isset($data['kty']) ? $data['kty'] : null;
        $this->container['use'] = isset($data['use']) ? $data['use'] : null;
        $this->container['kid'] = isset($data['kid']) ? $data['kid'] : null;
        $this->container['n'] = isset($data['n']) ? $data['n'] : null;
        $this->container['e'] = isset($data['e']) ? $data['e'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets kty
     * @return string
     */
    public function getKty()
    {
        return $this->container['kty'];
    }

    /**
     * Sets kty
     * @param string $kty Algorithm used to encrypt the public key.
     * @return $this
     */
    public function setKty($kty)
    {
        $this->container['kty'] = $kty;

        return $this;
    }

    /**
     * Gets use
     * @return string
     */
    public function getUse()
    {
        return $this->container['use'];
    }

    /**
     * Sets use
     * @param string $use Defines whether to use the key for encryption (enc) or verifying a signature (sig). Always returned as enc.
     * @return $this
     */
    public function setUse($use)
    {
        $this->container['use'] = $use;

        return $this;
    }

    /**
     * Gets kid
     * @return string
     */
    public function getKid()
    {
        return $this->container['kid'];
    }

    /**
     * Sets kid
     * @param string $kid The key ID in JWK format.
     * @return $this
     */
    public function setKid($kid)
    {
        $this->container['kid'] = $kid;

        return $this;
    }

    /**
     * Gets n
     * @return string
     */
    public function getN()
    {
        return $this->container['n'];
    }

    /**
     * Sets n
     * @param string $n JWK RSA Modulus
     * @return $this
     */
    public function setN($n)
    {
        $this->container['n'] = $n;

        return $this;
    }

    /**
     * Gets e
     * @return string
     */
    public function getE()
    {
        return $this->container['e'];
    }

    /**
     * Sets e
     * @param string $e JWK RSA Exponent
     * @return $this
     */
    public function setE($e)
    {
        $this->container['e'] = $e;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Incevio\Cybersource\CybersourceSDK\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Incevio\Cybersource\CybersourceSDK\ObjectSerializer::sanitizeForSerialization($this));
    }
}


