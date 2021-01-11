<?php
/**
 * ReportingV3PurchaseRefundDetailsGet200ResponseSettlementStatuses
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
 * ReportingV3PurchaseRefundDetailsGet200ResponseSettlementStatuses Class Doc Comment
 *
 * @category    Class
 * @description Settlement Status Section Values.
 * @package     Incevio\Cybersource\CybersourceSDK
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ReportingV3PurchaseRefundDetailsGet200ResponseSettlementStatuses implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'reportingV3PurchaseRefundDetailsGet200Response_settlementStatuses';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'requestId' => 'string',
        'status' => 'string',
        'settlementTime' => '\DateTime',
        'reasonCode' => 'string',
        'errorText' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'requestId' => null,
        'status' => null,
        'settlementTime' => 'date-time',
        'reasonCode' => null,
        'errorText' => null
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
        'requestId' => 'requestId',
        'status' => 'status',
        'settlementTime' => 'settlementTime',
        'reasonCode' => 'reasonCode',
        'errorText' => 'errorText'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'requestId' => 'setRequestId',
        'status' => 'setStatus',
        'settlementTime' => 'setSettlementTime',
        'reasonCode' => 'setReasonCode',
        'errorText' => 'setErrorText'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'requestId' => 'getRequestId',
        'status' => 'getStatus',
        'settlementTime' => 'getSettlementTime',
        'reasonCode' => 'getReasonCode',
        'errorText' => 'getErrorText'
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
        $this->container['requestId'] = isset($data['requestId']) ? $data['requestId'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['settlementTime'] = isset($data['settlementTime']) ? $data['settlementTime'] : null;
        $this->container['reasonCode'] = isset($data['reasonCode']) ? $data['reasonCode'] : null;
        $this->container['errorText'] = isset($data['errorText']) ? $data['errorText'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['requestId']) && (strlen($this->container['requestId']) > 26)) {
            $invalid_properties[] = "invalid value for 'requestId', the character length must be smaller than or equal to 26.";
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

        if (strlen($this->container['requestId']) > 26) {
            return false;
        }
        return true;
    }


    /**
     * Gets requestId
     * @return string
     */
    public function getRequestId()
    {
        return $this->container['requestId'];
    }

    /**
     * Sets requestId
     * @param string $requestId An unique identification number assigned by Incevio\Cybersource\CybersourceSDK to identify the submitted request.
     * @return $this
     */
    public function setRequestId($requestId)
    {
        if (!is_null($requestId) && (strlen($requestId) > 26)) {
            throw new \InvalidArgumentException('invalid length for $requestId when calling ReportingV3PurchaseRefundDetailsGet200ResponseSettlementStatuses., must be smaller than or equal to 26.');
        }

        $this->container['requestId'] = $requestId;

        return $this;
    }

    /**
     * Gets status
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     * @param string $status Settlement Status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets settlementTime
     * @return \DateTime
     */
    public function getSettlementTime()
    {
        return $this->container['settlementTime'];
    }

    /**
     * Sets settlementTime
     * @param \DateTime $settlementTime Settlement Date
     * @return $this
     */
    public function setSettlementTime($settlementTime)
    {
        $this->container['settlementTime'] = $settlementTime;

        return $this;
    }

    /**
     * Gets reasonCode
     * @return string
     */
    public function getReasonCode()
    {
        return $this->container['reasonCode'];
    }

    /**
     * Sets reasonCode
     * @param string $reasonCode ReasonCode
     * @return $this
     */
    public function setReasonCode($reasonCode)
    {
        $this->container['reasonCode'] = $reasonCode;

        return $this;
    }

    /**
     * Gets errorText
     * @return string
     */
    public function getErrorText()
    {
        return $this->container['errorText'];
    }

    /**
     * Sets errorText
     * @param string $errorText errorText
     * @return $this
     */
    public function setErrorText($errorText)
    {
        $this->container['errorText'] = $errorText;

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


