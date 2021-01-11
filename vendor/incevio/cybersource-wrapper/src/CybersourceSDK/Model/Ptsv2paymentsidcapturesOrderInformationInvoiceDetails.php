<?php
/**
 * Ptsv2paymentsidcapturesOrderInformationInvoiceDetails
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
 * Ptsv2paymentsidcapturesOrderInformationInvoiceDetails Class Doc Comment
 *
 * @category    Class
 * @package     Incevio\Cybersource\CybersourceSDK
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Ptsv2paymentsidcapturesOrderInformationInvoiceDetails implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ptsv2paymentsidcaptures_orderInformation_invoiceDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'purchaseOrderNumber' => 'string',
        'purchaseOrderDate' => 'string',
        'purchaseContactName' => 'string',
        'taxable' => 'bool',
        'vatInvoiceReferenceNumber' => 'string',
        'commodityCode' => 'string',
        'transactionAdviceAddendum' => '\Incevio\Cybersource\CybersourceSDK\Model\Ptsv2paymentsOrderInformationInvoiceDetailsTransactionAdviceAddendum[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'purchaseOrderNumber' => null,
        'purchaseOrderDate' => null,
        'purchaseContactName' => null,
        'taxable' => null,
        'vatInvoiceReferenceNumber' => null,
        'commodityCode' => null,
        'transactionAdviceAddendum' => null
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
        'purchaseOrderNumber' => 'purchaseOrderNumber',
        'purchaseOrderDate' => 'purchaseOrderDate',
        'purchaseContactName' => 'purchaseContactName',
        'taxable' => 'taxable',
        'vatInvoiceReferenceNumber' => 'vatInvoiceReferenceNumber',
        'commodityCode' => 'commodityCode',
        'transactionAdviceAddendum' => 'transactionAdviceAddendum'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'purchaseOrderNumber' => 'setPurchaseOrderNumber',
        'purchaseOrderDate' => 'setPurchaseOrderDate',
        'purchaseContactName' => 'setPurchaseContactName',
        'taxable' => 'setTaxable',
        'vatInvoiceReferenceNumber' => 'setVatInvoiceReferenceNumber',
        'commodityCode' => 'setCommodityCode',
        'transactionAdviceAddendum' => 'setTransactionAdviceAddendum'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'purchaseOrderNumber' => 'getPurchaseOrderNumber',
        'purchaseOrderDate' => 'getPurchaseOrderDate',
        'purchaseContactName' => 'getPurchaseContactName',
        'taxable' => 'getTaxable',
        'vatInvoiceReferenceNumber' => 'getVatInvoiceReferenceNumber',
        'commodityCode' => 'getCommodityCode',
        'transactionAdviceAddendum' => 'getTransactionAdviceAddendum'
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
        $this->container['purchaseOrderNumber'] = isset($data['purchaseOrderNumber']) ? $data['purchaseOrderNumber'] : null;
        $this->container['purchaseOrderDate'] = isset($data['purchaseOrderDate']) ? $data['purchaseOrderDate'] : null;
        $this->container['purchaseContactName'] = isset($data['purchaseContactName']) ? $data['purchaseContactName'] : null;
        $this->container['taxable'] = isset($data['taxable']) ? $data['taxable'] : null;
        $this->container['vatInvoiceReferenceNumber'] = isset($data['vatInvoiceReferenceNumber']) ? $data['vatInvoiceReferenceNumber'] : null;
        $this->container['commodityCode'] = isset($data['commodityCode']) ? $data['commodityCode'] : null;
        $this->container['transactionAdviceAddendum'] = isset($data['transactionAdviceAddendum']) ? $data['transactionAdviceAddendum'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['purchaseOrderNumber']) && (strlen($this->container['purchaseOrderNumber']) > 25)) {
            $invalid_properties[] = "invalid value for 'purchaseOrderNumber', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['purchaseOrderDate']) && (strlen($this->container['purchaseOrderDate']) > 10)) {
            $invalid_properties[] = "invalid value for 'purchaseOrderDate', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['purchaseContactName']) && (strlen($this->container['purchaseContactName']) > 36)) {
            $invalid_properties[] = "invalid value for 'purchaseContactName', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['vatInvoiceReferenceNumber']) && (strlen($this->container['vatInvoiceReferenceNumber']) > 15)) {
            $invalid_properties[] = "invalid value for 'vatInvoiceReferenceNumber', the character length must be smaller than or equal to 15.";
        }

        if (!is_null($this->container['commodityCode']) && (strlen($this->container['commodityCode']) > 4)) {
            $invalid_properties[] = "invalid value for 'commodityCode', the character length must be smaller than or equal to 4.";
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

        if (strlen($this->container['purchaseOrderNumber']) > 25) {
            return false;
        }
        if (strlen($this->container['purchaseOrderDate']) > 10) {
            return false;
        }
        if (strlen($this->container['purchaseContactName']) > 36) {
            return false;
        }
        if (strlen($this->container['vatInvoiceReferenceNumber']) > 15) {
            return false;
        }
        if (strlen($this->container['commodityCode']) > 4) {
            return false;
        }
        return true;
    }


    /**
     * Gets purchaseOrderNumber
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return $this->container['purchaseOrderNumber'];
    }

    /**
     * Sets purchaseOrderNumber
     * @param string $purchaseOrderNumber Value used by your customer to identify the order. This value is typically a purchase order number. Incevio\Cybersource\CybersourceSDK recommends that you do not populate the field with all zeros or nines.  For processor-specific information, see the `user_po` field in [Level II and Level III Processing Using the SCMP API.](http://apps.cybersource.com/library/documentation/dev_guides/Level_2_3_SCMP_API/html)
     * @return $this
     */
    public function setPurchaseOrderNumber($purchaseOrderNumber)
    {
        if (!is_null($purchaseOrderNumber) && (strlen($purchaseOrderNumber) > 25)) {
            throw new \InvalidArgumentException('invalid length for $purchaseOrderNumber when calling Ptsv2paymentsidcapturesOrderInformationInvoiceDetails., must be smaller than or equal to 25.');
        }

        $this->container['purchaseOrderNumber'] = $purchaseOrderNumber;

        return $this;
    }

    /**
     * Gets purchaseOrderDate
     * @return string
     */
    public function getPurchaseOrderDate()
    {
        return $this->container['purchaseOrderDate'];
    }

    /**
     * Sets purchaseOrderDate
     * @param string $purchaseOrderDate Date the order was processed. `Format: YYYY-MM-DD`.  For processor-specific information, see the `purchaser_order_date` field in [Level II and Level III Processing Using the SCMP API.](http://apps.cybersource.com/library/documentation/dev_guides/Level_2_3_SCMP_API/html)
     * @return $this
     */
    public function setPurchaseOrderDate($purchaseOrderDate)
    {
        if (!is_null($purchaseOrderDate) && (strlen($purchaseOrderDate) > 10)) {
            throw new \InvalidArgumentException('invalid length for $purchaseOrderDate when calling Ptsv2paymentsidcapturesOrderInformationInvoiceDetails., must be smaller than or equal to 10.');
        }

        $this->container['purchaseOrderDate'] = $purchaseOrderDate;

        return $this;
    }

    /**
     * Gets purchaseContactName
     * @return string
     */
    public function getPurchaseContactName()
    {
        return $this->container['purchaseContactName'];
    }

    /**
     * Sets purchaseContactName
     * @param string $purchaseContactName The name of the individual or the company contacted for company authorized purchases.  For processor-specific information, see the `authorized_contact_name` field in [Level II and Level III Processing Using the SCMP API.](http://apps.cybersource.com/library/documentation/dev_guides/Level_2_3_SCMP_API/html)
     * @return $this
     */
    public function setPurchaseContactName($purchaseContactName)
    {
        if (!is_null($purchaseContactName) && (strlen($purchaseContactName) > 36)) {
            throw new \InvalidArgumentException('invalid length for $purchaseContactName when calling Ptsv2paymentsidcapturesOrderInformationInvoiceDetails., must be smaller than or equal to 36.');
        }

        $this->container['purchaseContactName'] = $purchaseContactName;

        return $this;
    }

    /**
     * Gets taxable
     * @return bool
     */
    public function getTaxable()
    {
        return $this->container['taxable'];
    }

    /**
     * Sets taxable
     * @param bool $taxable Flag that indicates whether an order is taxable. This value must be true if the sum of all _lineItems[].taxAmount_ values > 0.  If you do not include any `lineItems[].taxAmount` values in your request, Incevio\Cybersource\CybersourceSDK does not include `invoiceDetails.taxable` in the data it sends to the processor.  For processor-specific information, see the `tax_indicator` field in [Level II and Level III Processing Using the SCMP API.](http://apps.cybersource.com/library/documentation/dev_guides/Level_2_3_SCMP_API/html)  Possible values:  - **true**  - **false**
     * @return $this
     */
    public function setTaxable($taxable)
    {
        $this->container['taxable'] = $taxable;

        return $this;
    }

    /**
     * Gets vatInvoiceReferenceNumber
     * @return string
     */
    public function getVatInvoiceReferenceNumber()
    {
        return $this->container['vatInvoiceReferenceNumber'];
    }

    /**
     * Sets vatInvoiceReferenceNumber
     * @param string $vatInvoiceReferenceNumber VAT invoice number associated with the transaction.  For processor-specific information, see the `vat_invoice_ref_number` field in [Level II and Level III Processing Using the SCMP API.](http://apps.cybersource.com/library/documentation/dev_guides/Level_2_3_SCMP_API/html)
     * @return $this
     */
    public function setVatInvoiceReferenceNumber($vatInvoiceReferenceNumber)
    {
        if (!is_null($vatInvoiceReferenceNumber) && (strlen($vatInvoiceReferenceNumber) > 15)) {
            throw new \InvalidArgumentException('invalid length for $vatInvoiceReferenceNumber when calling Ptsv2paymentsidcapturesOrderInformationInvoiceDetails., must be smaller than or equal to 15.');
        }

        $this->container['vatInvoiceReferenceNumber'] = $vatInvoiceReferenceNumber;

        return $this;
    }

    /**
     * Gets commodityCode
     * @return string
     */
    public function getCommodityCode()
    {
        return $this->container['commodityCode'];
    }

    /**
     * Sets commodityCode
     * @param string $commodityCode International description code of the overall order’s goods or services or the Categorizes purchases for VAT reporting. Contact your acquirer for a list of codes.  For processor-specific information, see the `summary_commodity_code` field in [Level II and Level III Processing Using the SCMP API.](http://apps.cybersource.com/library/documentation/dev_guides/Level_2_3_SCMP_API/html)
     * @return $this
     */
    public function setCommodityCode($commodityCode)
    {
        if (!is_null($commodityCode) && (strlen($commodityCode) > 4)) {
            throw new \InvalidArgumentException('invalid length for $commodityCode when calling Ptsv2paymentsidcapturesOrderInformationInvoiceDetails., must be smaller than or equal to 4.');
        }

        $this->container['commodityCode'] = $commodityCode;

        return $this;
    }

    /**
     * Gets transactionAdviceAddendum
     * @return \Incevio\Cybersource\CybersourceSDK\Model\Ptsv2paymentsOrderInformationInvoiceDetailsTransactionAdviceAddendum[]
     */
    public function getTransactionAdviceAddendum()
    {
        return $this->container['transactionAdviceAddendum'];
    }

    /**
     * Sets transactionAdviceAddendum
     * @param \Incevio\Cybersource\CybersourceSDK\Model\Ptsv2paymentsOrderInformationInvoiceDetailsTransactionAdviceAddendum[] $transactionAdviceAddendum
     * @return $this
     */
    public function setTransactionAdviceAddendum($transactionAdviceAddendum)
    {
        $this->container['transactionAdviceAddendum'] = $transactionAdviceAddendum;

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


