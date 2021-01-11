<?php
/**
 * TssV2TransactionsGet200ResponsePaymentInformationBankMandate
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
 * TssV2TransactionsGet200ResponsePaymentInformationBankMandate Class Doc Comment
 *
 * @category    Class
 * @package     Incevio\Cybersource\CybersourceSDK
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class TssV2TransactionsGet200ResponsePaymentInformationBankMandate implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'tssV2TransactionsGet200Response_paymentInformation_bank_mandate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'referenceNumber' => 'string',
        'recurringType' => 'string',
        'id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'referenceNumber' => null,
        'recurringType' => null,
        'id' => null
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
        'referenceNumber' => 'referenceNumber',
        'recurringType' => 'recurringType',
        'id' => 'id'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'referenceNumber' => 'setReferenceNumber',
        'recurringType' => 'setRecurringType',
        'id' => 'setId'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'referenceNumber' => 'getReferenceNumber',
        'recurringType' => 'getRecurringType',
        'id' => 'getId'
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
        $this->container['referenceNumber'] = isset($data['referenceNumber']) ? $data['referenceNumber'] : null;
        $this->container['recurringType'] = isset($data['recurringType']) ? $data['recurringType'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
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
     * Gets referenceNumber
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->container['referenceNumber'];
    }

    /**
     * Sets referenceNumber
     * @param string $referenceNumber Unique value generated by Incevio\Cybersource\CybersourceSDK that identifies the transaction. Use this value to identify transactions in the Collections Report, which provides settlement information.  For details, see the `direct_debit_reconciliation_reference_number` reply field description in [Ingenico ePayments Developer Guide For Direct Debits.](https://apps.cybersource.com/library/documentation/dev_guides/Ingenico_ePayments_Dev/html/)
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->container['referenceNumber'] = $referenceNumber;

        return $this;
    }

    /**
     * Gets recurringType
     * @return string
     */
    public function getRecurringType()
    {
        return $this->container['recurringType'];
    }

    /**
     * Sets recurringType
     * @param string $recurringType Whether the direct debit is the first or last direct debit associated with the mandate, or one in between. Required only for the United Kingdom. Possible values: - `001`: First direct debit associated with this mandate. Use this value if a one-time direct debit). - `002`: Subsequent direct debits associated with this mandate. - `003`: Last direct debit associated with this mandate.  For details, see the `direct_debit_recurring_type` request field description in [Ingenico ePayments Developer Guide For Direct Debits.](https://apps.cybersource.com/library/documentation/dev_guides/Ingenico_ePayments_Dev/html/)
     * @return $this
     */
    public function setRecurringType($recurringType)
    {
        $this->container['recurringType'] = $recurringType;

        return $this;
    }

    /**
     * Gets id
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param string $id The mandate ID. Required only for the United Kingdom.  For details, see the `mandate_id` request field description in [Ingenico ePayments Developer Guide For Direct Debits.](https://apps.cybersource.com/library/documentation/dev_guides/Ingenico_ePayments_Dev/html/)
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

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


