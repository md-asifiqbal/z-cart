<?php
/**
 * Ptsv2paymentsOrderInformationShippingDetails
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
 * Ptsv2paymentsOrderInformationShippingDetails Class Doc Comment
 *
 * @category    Class
 * @description Contains shipping information not related to address.
 * @package     Incevio\Cybersource\CybersourceSDK
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Ptsv2paymentsOrderInformationShippingDetails implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ptsv2payments_orderInformation_shippingDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'giftWrap' => 'bool',
        'shippingMethod' => 'string',
        'shipFromPostalCode' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'giftWrap' => null,
        'shippingMethod' => null,
        'shipFromPostalCode' => null
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
        'giftWrap' => 'giftWrap',
        'shippingMethod' => 'shippingMethod',
        'shipFromPostalCode' => 'shipFromPostalCode'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'giftWrap' => 'setGiftWrap',
        'shippingMethod' => 'setShippingMethod',
        'shipFromPostalCode' => 'setShipFromPostalCode'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'giftWrap' => 'getGiftWrap',
        'shippingMethod' => 'getShippingMethod',
        'shipFromPostalCode' => 'getShipFromPostalCode'
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
        $this->container['giftWrap'] = isset($data['giftWrap']) ? $data['giftWrap'] : null;
        $this->container['shippingMethod'] = isset($data['shippingMethod']) ? $data['shippingMethod'] : null;
        $this->container['shipFromPostalCode'] = isset($data['shipFromPostalCode']) ? $data['shipFromPostalCode'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['shippingMethod']) && (strlen($this->container['shippingMethod']) > 10)) {
            $invalid_properties[] = "invalid value for 'shippingMethod', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['shipFromPostalCode']) && (strlen($this->container['shipFromPostalCode']) > 10)) {
            $invalid_properties[] = "invalid value for 'shipFromPostalCode', the character length must be smaller than or equal to 10.";
        }

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

        if (strlen($this->container['shippingMethod']) > 10) {
            return false;
        }
        if (strlen($this->container['shipFromPostalCode']) > 10) {
            return false;
        }
        return true;
    }


    /**
     * Gets giftWrap
     * @return bool
     */
    public function getGiftWrap()
    {
        return $this->container['giftWrap'];
    }

    /**
     * Sets giftWrap
     * @param bool $giftWrap Boolean that indicates whether the customer requested gift wrapping for this purchase. This field can contain one of the following values: - true: The customer requested gift wrapping. - false: The customer did not request gift wrapping.
     * @return $this
     */
    public function setGiftWrap($giftWrap)
    {
        $this->container['giftWrap'] = $giftWrap;

        return $this;
    }

    /**
     * Gets shippingMethod
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->container['shippingMethod'];
    }

    /**
     * Sets shippingMethod
     * @param string $shippingMethod Shipping method for the product. Possible values:   - `lowcost`: Lowest-cost service  - `sameday`: Courier or same-day service  - `oneday`: Next-day or overnight service  - `twoday`: Two-day service  - `threeday`: Three-day service  - `pickup`: Store pick-up  - `other`: Other shipping method  - `none`: No shipping method because product is a service or subscription
     * @return $this
     */
    public function setShippingMethod($shippingMethod)
    {
        if (!is_null($shippingMethod) && (strlen($shippingMethod) > 10)) {
            throw new \InvalidArgumentException('invalid length for $shippingMethod when calling Ptsv2paymentsOrderInformationShippingDetails., must be smaller than or equal to 10.');
        }

        $this->container['shippingMethod'] = $shippingMethod;

        return $this;
    }

    /**
     * Gets shipFromPostalCode
     * @return string
     */
    public function getShipFromPostalCode()
    {
        return $this->container['shipFromPostalCode'];
    }

    /**
     * Sets shipFromPostalCode
     * @param string $shipFromPostalCode Postal code for the address from which the goods are shipped, which is used to establish nexus. The default is the postal code associated with your Incevio\Cybersource\CybersourceSDK account.  The postal code must consist of 5 to 9 digits. When the billing country is the U.S., the 9-digit postal code must follow this format:  `[5 digits][dash][4 digits]`  Example 12345-6789  When the billing country is Canada, the 6-digit postal code must follow this format:  `[alpha][numeric][alpha][space] [numeric][alpha][numeric]`  Example A1B 2C3  This field is frequently used for Level II and Level III transactions.
     * @return $this
     */
    public function setShipFromPostalCode($shipFromPostalCode)
    {
        if (!is_null($shipFromPostalCode) && (strlen($shipFromPostalCode) > 10)) {
            throw new \InvalidArgumentException('invalid length for $shipFromPostalCode when calling Ptsv2paymentsOrderInformationShippingDetails., must be smaller than or equal to 10.');
        }

        $this->container['shipFromPostalCode'] = $shipFromPostalCode;

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

