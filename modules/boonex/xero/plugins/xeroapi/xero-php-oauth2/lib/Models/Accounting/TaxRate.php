<?php
/**
 * TaxRate
 *
 * PHP version 5
 *
 * @category Class
 * @package  XeroAPI\XeroPHP
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Xero Accounting API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * Contact: api@xero.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.3.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace XeroAPI\XeroPHP\Models\Accounting;

use \ArrayAccess;
use \XeroAPI\XeroPHP\AccountingObjectSerializer;
use \XeroAPI\XeroPHP\StringUtil;
/**
 * TaxRate Class Doc Comment
 *
 * @category Class
 * @package  XeroAPI\XeroPHP
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class TaxRate implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TaxRate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'tax_type' => 'string',
        'tax_components' => '\XeroAPI\XeroPHP\Models\Accounting\TaxComponent[]',
        'status' => 'string',
        'report_tax_type' => 'string',
        'can_apply_to_assets' => 'bool',
        'can_apply_to_equity' => 'bool',
        'can_apply_to_expenses' => 'bool',
        'can_apply_to_liabilities' => 'bool',
        'can_apply_to_revenue' => 'bool',
        'display_tax_rate' => 'double',
        'effective_rate' => 'double'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'name' => null,
        'tax_type' => null,
        'tax_components' => null,
        'status' => null,
        'report_tax_type' => null,
        'can_apply_to_assets' => null,
        'can_apply_to_equity' => null,
        'can_apply_to_expenses' => null,
        'can_apply_to_liabilities' => null,
        'can_apply_to_revenue' => null,
        'display_tax_rate' => 'double',
        'effective_rate' => 'double'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'Name',
        'tax_type' => 'TaxType',
        'tax_components' => 'TaxComponents',
        'status' => 'Status',
        'report_tax_type' => 'ReportTaxType',
        'can_apply_to_assets' => 'CanApplyToAssets',
        'can_apply_to_equity' => 'CanApplyToEquity',
        'can_apply_to_expenses' => 'CanApplyToExpenses',
        'can_apply_to_liabilities' => 'CanApplyToLiabilities',
        'can_apply_to_revenue' => 'CanApplyToRevenue',
        'display_tax_rate' => 'DisplayTaxRate',
        'effective_rate' => 'EffectiveRate'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'tax_type' => 'setTaxType',
        'tax_components' => 'setTaxComponents',
        'status' => 'setStatus',
        'report_tax_type' => 'setReportTaxType',
        'can_apply_to_assets' => 'setCanApplyToAssets',
        'can_apply_to_equity' => 'setCanApplyToEquity',
        'can_apply_to_expenses' => 'setCanApplyToExpenses',
        'can_apply_to_liabilities' => 'setCanApplyToLiabilities',
        'can_apply_to_revenue' => 'setCanApplyToRevenue',
        'display_tax_rate' => 'setDisplayTaxRate',
        'effective_rate' => 'setEffectiveRate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'tax_type' => 'getTaxType',
        'tax_components' => 'getTaxComponents',
        'status' => 'getStatus',
        'report_tax_type' => 'getReportTaxType',
        'can_apply_to_assets' => 'getCanApplyToAssets',
        'can_apply_to_equity' => 'getCanApplyToEquity',
        'can_apply_to_expenses' => 'getCanApplyToExpenses',
        'can_apply_to_liabilities' => 'getCanApplyToLiabilities',
        'can_apply_to_revenue' => 'getCanApplyToRevenue',
        'display_tax_rate' => 'getDisplayTaxRate',
        'effective_rate' => 'getEffectiveRate'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_DELETED = 'DELETED';
    const STATUS_ARCHIVED = 'ARCHIVED';
    const STATUS_PENDING = 'PENDING';
    const REPORT_TAX_TYPE_AVALARA = 'AVALARA';
    const REPORT_TAX_TYPE_BASEXCLUDED = 'BASEXCLUDED';
    const REPORT_TAX_TYPE_CAPITALSALESOUTPUT = 'CAPITALSALESOUTPUT';
    const REPORT_TAX_TYPE_CAPITALEXPENSESINPUT = 'CAPITALEXPENSESINPUT';
    const REPORT_TAX_TYPE_ECOUTPUT = 'ECOUTPUT';
    const REPORT_TAX_TYPE_ECOUTPUTSERVICES = 'ECOUTPUTSERVICES';
    const REPORT_TAX_TYPE_ECINPUT = 'ECINPUT';
    const REPORT_TAX_TYPE_ECACQUISITIONS = 'ECACQUISITIONS';
    const REPORT_TAX_TYPE_EXEMPTEXPENSES = 'EXEMPTEXPENSES';
    const REPORT_TAX_TYPE_EXEMPTINPUT = 'EXEMPTINPUT';
    const REPORT_TAX_TYPE_EXEMPTOUTPUT = 'EXEMPTOUTPUT';
    const REPORT_TAX_TYPE_GSTONIMPORTS = 'GSTONIMPORTS';
    const REPORT_TAX_TYPE_INPUT = 'INPUT';
    const REPORT_TAX_TYPE_INPUTTAXED = 'INPUTTAXED';
    const REPORT_TAX_TYPE_MOSSSALES = 'MOSSSALES';
    const REPORT_TAX_TYPE_NONE = 'NONE';
    const REPORT_TAX_TYPE_NONEOUTPUT = 'NONEOUTPUT';
    const REPORT_TAX_TYPE_OUTPUT = 'OUTPUT';
    const REPORT_TAX_TYPE_PURCHASESINPUT = 'PURCHASESINPUT';
    const REPORT_TAX_TYPE_SALESOUTPUT = 'SALESOUTPUT';
    const REPORT_TAX_TYPE_EXEMPTCAPITAL = 'EXEMPTCAPITAL';
    const REPORT_TAX_TYPE_EXEMPTEXPORT = 'EXEMPTEXPORT';
    const REPORT_TAX_TYPE_CAPITALEXINPUT = 'CAPITALEXINPUT';
    const REPORT_TAX_TYPE_GSTONCAPIMPORTS = 'GSTONCAPIMPORTS';
    const REPORT_TAX_TYPE_GSTONCAPITALIMPORTS = 'GSTONCAPITALIMPORTS';
    const REPORT_TAX_TYPE_REVERSECHARGES = 'REVERSECHARGES';
    const REPORT_TAX_TYPE_PAYMENTS = 'PAYMENTS';
    const REPORT_TAX_TYPE_INVOICE = 'INVOICE';
    const REPORT_TAX_TYPE_CASH = 'CASH';
    const REPORT_TAX_TYPE_ACCRUAL = 'ACCRUAL';
    const REPORT_TAX_TYPE_FLATRATECASH = 'FLATRATECASH';
    const REPORT_TAX_TYPE_FLATRATEACCRUAL = 'FLATRATEACCRUAL';
    const REPORT_TAX_TYPE_ACCRUALS = 'ACCRUALS';
    const REPORT_TAX_TYPE_TXCA = 'TXCA';
    const REPORT_TAX_TYPE_SRCAS = 'SRCAS';
    const REPORT_TAX_TYPE_DSOUTPUT = 'DSOUTPUT';
    const REPORT_TAX_TYPE_BLINPUT2 = 'BLINPUT2';
    const REPORT_TAX_TYPE_EPINPUT = 'EPINPUT';
    const REPORT_TAX_TYPE_IMINPUT2 = 'IMINPUT2';
    const REPORT_TAX_TYPE_MEINPUT = 'MEINPUT';
    const REPORT_TAX_TYPE_IGDSINPUT2 = 'IGDSINPUT2';
    const REPORT_TAX_TYPE_ESN33_OUTPUT = 'ESN33OUTPUT';
    const REPORT_TAX_TYPE_OPINPUT = 'OPINPUT';
    const REPORT_TAX_TYPE_OSOUTPUT = 'OSOUTPUT';
    const REPORT_TAX_TYPE_TXN33_INPUT = 'TXN33INPUT';
    const REPORT_TAX_TYPE_TXESSINPUT = 'TXESSINPUT';
    const REPORT_TAX_TYPE_TXREINPUT = 'TXREINPUT';
    const REPORT_TAX_TYPE_TXPETINPUT = 'TXPETINPUT';
    const REPORT_TAX_TYPE_NRINPUT = 'NRINPUT';
    const REPORT_TAX_TYPE_ES33_OUTPUT = 'ES33OUTPUT';
    const REPORT_TAX_TYPE_ZERORATEDINPUT = 'ZERORATEDINPUT';
    const REPORT_TAX_TYPE_ZERORATEDOUTPUT = 'ZERORATEDOUTPUT';
    const REPORT_TAX_TYPE_DRCHARGESUPPLY = 'DRCHARGESUPPLY';
    const REPORT_TAX_TYPE_DRCHARGE = 'DRCHARGE';
    const REPORT_TAX_TYPE_CAPINPUT = 'CAPINPUT';
    const REPORT_TAX_TYPE_CAPIMPORTS = 'CAPIMPORTS';
    const REPORT_TAX_TYPE_IMINPUT = 'IMINPUT';
    const REPORT_TAX_TYPE_INPUT2 = 'INPUT2';
    const REPORT_TAX_TYPE_CIUINPUT = 'CIUINPUT';
    const REPORT_TAX_TYPE_SRINPUT = 'SRINPUT';
    const REPORT_TAX_TYPE_OUTPUT2 = 'OUTPUT2';
    const REPORT_TAX_TYPE_SROUTPUT = 'SROUTPUT';
    const REPORT_TAX_TYPE_CAPOUTPUT = 'CAPOUTPUT';
    const REPORT_TAX_TYPE_SROUTPUT2 = 'SROUTPUT2';
    const REPORT_TAX_TYPE_CIUOUTPUT = 'CIUOUTPUT';
    const REPORT_TAX_TYPE_ZROUTPUT = 'ZROUTPUT';
    const REPORT_TAX_TYPE_ZREXPORT = 'ZREXPORT';
    const REPORT_TAX_TYPE_ACC28_PLUS = 'ACC28PLUS';
    const REPORT_TAX_TYPE_ACCUPTO28 = 'ACCUPTO28';
    const REPORT_TAX_TYPE_OTHEROUTPUT = 'OTHEROUTPUT';
    const REPORT_TAX_TYPE_SHOUTPUT = 'SHOUTPUT';
    const REPORT_TAX_TYPE_ZRINPUT = 'ZRINPUT';
    const REPORT_TAX_TYPE_BADDEBT = 'BADDEBT';
    const REPORT_TAX_TYPE_OTHERINPUT = 'OTHERINPUT';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_DELETED,
            self::STATUS_ARCHIVED,
            self::STATUS_PENDING,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getReportTaxTypeAllowableValues()
    {
        return [
            self::REPORT_TAX_TYPE_AVALARA,
            self::REPORT_TAX_TYPE_BASEXCLUDED,
            self::REPORT_TAX_TYPE_CAPITALSALESOUTPUT,
            self::REPORT_TAX_TYPE_CAPITALEXPENSESINPUT,
            self::REPORT_TAX_TYPE_ECOUTPUT,
            self::REPORT_TAX_TYPE_ECOUTPUTSERVICES,
            self::REPORT_TAX_TYPE_ECINPUT,
            self::REPORT_TAX_TYPE_ECACQUISITIONS,
            self::REPORT_TAX_TYPE_EXEMPTEXPENSES,
            self::REPORT_TAX_TYPE_EXEMPTINPUT,
            self::REPORT_TAX_TYPE_EXEMPTOUTPUT,
            self::REPORT_TAX_TYPE_GSTONIMPORTS,
            self::REPORT_TAX_TYPE_INPUT,
            self::REPORT_TAX_TYPE_INPUTTAXED,
            self::REPORT_TAX_TYPE_MOSSSALES,
            self::REPORT_TAX_TYPE_NONE,
            self::REPORT_TAX_TYPE_NONEOUTPUT,
            self::REPORT_TAX_TYPE_OUTPUT,
            self::REPORT_TAX_TYPE_PURCHASESINPUT,
            self::REPORT_TAX_TYPE_SALESOUTPUT,
            self::REPORT_TAX_TYPE_EXEMPTCAPITAL,
            self::REPORT_TAX_TYPE_EXEMPTEXPORT,
            self::REPORT_TAX_TYPE_CAPITALEXINPUT,
            self::REPORT_TAX_TYPE_GSTONCAPIMPORTS,
            self::REPORT_TAX_TYPE_GSTONCAPITALIMPORTS,
            self::REPORT_TAX_TYPE_REVERSECHARGES,
            self::REPORT_TAX_TYPE_PAYMENTS,
            self::REPORT_TAX_TYPE_INVOICE,
            self::REPORT_TAX_TYPE_CASH,
            self::REPORT_TAX_TYPE_ACCRUAL,
            self::REPORT_TAX_TYPE_FLATRATECASH,
            self::REPORT_TAX_TYPE_FLATRATEACCRUAL,
            self::REPORT_TAX_TYPE_ACCRUALS,
            self::REPORT_TAX_TYPE_TXCA,
            self::REPORT_TAX_TYPE_SRCAS,
            self::REPORT_TAX_TYPE_DSOUTPUT,
            self::REPORT_TAX_TYPE_BLINPUT2,
            self::REPORT_TAX_TYPE_EPINPUT,
            self::REPORT_TAX_TYPE_IMINPUT2,
            self::REPORT_TAX_TYPE_MEINPUT,
            self::REPORT_TAX_TYPE_IGDSINPUT2,
            self::REPORT_TAX_TYPE_ESN33_OUTPUT,
            self::REPORT_TAX_TYPE_OPINPUT,
            self::REPORT_TAX_TYPE_OSOUTPUT,
            self::REPORT_TAX_TYPE_TXN33_INPUT,
            self::REPORT_TAX_TYPE_TXESSINPUT,
            self::REPORT_TAX_TYPE_TXREINPUT,
            self::REPORT_TAX_TYPE_TXPETINPUT,
            self::REPORT_TAX_TYPE_NRINPUT,
            self::REPORT_TAX_TYPE_ES33_OUTPUT,
            self::REPORT_TAX_TYPE_ZERORATEDINPUT,
            self::REPORT_TAX_TYPE_ZERORATEDOUTPUT,
            self::REPORT_TAX_TYPE_DRCHARGESUPPLY,
            self::REPORT_TAX_TYPE_DRCHARGE,
            self::REPORT_TAX_TYPE_CAPINPUT,
            self::REPORT_TAX_TYPE_CAPIMPORTS,
            self::REPORT_TAX_TYPE_IMINPUT,
            self::REPORT_TAX_TYPE_INPUT2,
            self::REPORT_TAX_TYPE_CIUINPUT,
            self::REPORT_TAX_TYPE_SRINPUT,
            self::REPORT_TAX_TYPE_OUTPUT2,
            self::REPORT_TAX_TYPE_SROUTPUT,
            self::REPORT_TAX_TYPE_CAPOUTPUT,
            self::REPORT_TAX_TYPE_SROUTPUT2,
            self::REPORT_TAX_TYPE_CIUOUTPUT,
            self::REPORT_TAX_TYPE_ZROUTPUT,
            self::REPORT_TAX_TYPE_ZREXPORT,
            self::REPORT_TAX_TYPE_ACC28_PLUS,
            self::REPORT_TAX_TYPE_ACCUPTO28,
            self::REPORT_TAX_TYPE_OTHEROUTPUT,
            self::REPORT_TAX_TYPE_SHOUTPUT,
            self::REPORT_TAX_TYPE_ZRINPUT,
            self::REPORT_TAX_TYPE_BADDEBT,
            self::REPORT_TAX_TYPE_OTHERINPUT,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['tax_type'] = isset($data['tax_type']) ? $data['tax_type'] : null;
        $this->container['tax_components'] = isset($data['tax_components']) ? $data['tax_components'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['report_tax_type'] = isset($data['report_tax_type']) ? $data['report_tax_type'] : null;
        $this->container['can_apply_to_assets'] = isset($data['can_apply_to_assets']) ? $data['can_apply_to_assets'] : null;
        $this->container['can_apply_to_equity'] = isset($data['can_apply_to_equity']) ? $data['can_apply_to_equity'] : null;
        $this->container['can_apply_to_expenses'] = isset($data['can_apply_to_expenses']) ? $data['can_apply_to_expenses'] : null;
        $this->container['can_apply_to_liabilities'] = isset($data['can_apply_to_liabilities']) ? $data['can_apply_to_liabilities'] : null;
        $this->container['can_apply_to_revenue'] = isset($data['can_apply_to_revenue']) ? $data['can_apply_to_revenue'] : null;
        $this->container['display_tax_rate'] = isset($data['display_tax_rate']) ? $data['display_tax_rate'] : null;
        $this->container['effective_rate'] = isset($data['effective_rate']) ? $data['effective_rate'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getReportTaxTypeAllowableValues();
        if (!is_null($this->container['report_tax_type']) && !in_array($this->container['report_tax_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'report_tax_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Name of tax rate
     *
     * @return $this
     */
    public function setName($name)
    {

        $this->container['name'] = $name;

        return $this;
    }



    /**
     * Gets tax_type
     *
     * @return string|null
     */
    public function getTaxType()
    {
        return $this->container['tax_type'];
    }

    /**
     * Sets tax_type
     *
     * @param string|null $tax_type The tax type
     *
     * @return $this
     */
    public function setTaxType($tax_type)
    {

        $this->container['tax_type'] = $tax_type;

        return $this;
    }



    /**
     * Gets tax_components
     *
     * @return \XeroAPI\XeroPHP\Models\Accounting\TaxComponent[]|null
     */
    public function getTaxComponents()
    {
        return $this->container['tax_components'];
    }

    /**
     * Sets tax_components
     *
     * @param \XeroAPI\XeroPHP\Models\Accounting\TaxComponent[]|null $tax_components See TaxComponents
     *
     * @return $this
     */
    public function setTaxComponents($tax_components)
    {

        $this->container['tax_components'] = $tax_components;

        return $this;
    }



    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status See Status Codes
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }

        $this->container['status'] = $status;

        return $this;
    }



    /**
     * Gets report_tax_type
     *
     * @return string|null
     */
    public function getReportTaxType()
    {
        return $this->container['report_tax_type'];
    }

    /**
     * Sets report_tax_type
     *
     * @param string|null $report_tax_type See ReportTaxTypes
     *
     * @return $this
     */
    public function setReportTaxType($report_tax_type)
    {
        $allowedValues = $this->getReportTaxTypeAllowableValues();
        if (!is_null($report_tax_type) && !in_array($report_tax_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'report_tax_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }

        $this->container['report_tax_type'] = $report_tax_type;

        return $this;
    }



    /**
     * Gets can_apply_to_assets
     *
     * @return bool|null
     */
    public function getCanApplyToAssets()
    {
        return $this->container['can_apply_to_assets'];
    }

    /**
     * Sets can_apply_to_assets
     *
     * @param bool|null $can_apply_to_assets Boolean to describe if tax rate can be used for asset accounts i.e.  true,false
     *
     * @return $this
     */
    public function setCanApplyToAssets($can_apply_to_assets)
    {

        $this->container['can_apply_to_assets'] = $can_apply_to_assets;

        return $this;
    }


    /**
     * Gets can_apply_to_equity
     *
     * @return bool|null
     */
    public function getCanApplyToEquity()
    {
        return $this->container['can_apply_to_equity'];
    }

    /**
     * Sets can_apply_to_equity
     *
     * @param bool|null $can_apply_to_equity Boolean to describe if tax rate can be used for equity accounts i.e true,false
     *
     * @return $this
     */
    public function setCanApplyToEquity($can_apply_to_equity)
    {

        $this->container['can_apply_to_equity'] = $can_apply_to_equity;

        return $this;
    }


    /**
     * Gets can_apply_to_expenses
     *
     * @return bool|null
     */
    public function getCanApplyToExpenses()
    {
        return $this->container['can_apply_to_expenses'];
    }

    /**
     * Sets can_apply_to_expenses
     *
     * @param bool|null $can_apply_to_expenses Boolean to describe if tax rate can be used for expense accounts  i.e. true,false
     *
     * @return $this
     */
    public function setCanApplyToExpenses($can_apply_to_expenses)
    {

        $this->container['can_apply_to_expenses'] = $can_apply_to_expenses;

        return $this;
    }


    /**
     * Gets can_apply_to_liabilities
     *
     * @return bool|null
     */
    public function getCanApplyToLiabilities()
    {
        return $this->container['can_apply_to_liabilities'];
    }

    /**
     * Sets can_apply_to_liabilities
     *
     * @param bool|null $can_apply_to_liabilities Boolean to describe if tax rate can be used for liability accounts  i.e. true,false
     *
     * @return $this
     */
    public function setCanApplyToLiabilities($can_apply_to_liabilities)
    {

        $this->container['can_apply_to_liabilities'] = $can_apply_to_liabilities;

        return $this;
    }


    /**
     * Gets can_apply_to_revenue
     *
     * @return bool|null
     */
    public function getCanApplyToRevenue()
    {
        return $this->container['can_apply_to_revenue'];
    }

    /**
     * Sets can_apply_to_revenue
     *
     * @param bool|null $can_apply_to_revenue Boolean to describe if tax rate can be used for revenue accounts i.e. true,false
     *
     * @return $this
     */
    public function setCanApplyToRevenue($can_apply_to_revenue)
    {

        $this->container['can_apply_to_revenue'] = $can_apply_to_revenue;

        return $this;
    }


    /**
     * Gets display_tax_rate
     *
     * @return double|null
     */
    public function getDisplayTaxRate()
    {
        return $this->container['display_tax_rate'];
    }

    /**
     * Sets display_tax_rate
     *
     * @param double|null $display_tax_rate Tax Rate (decimal to 4dp) e.g 12.5000
     *
     * @return $this
     */
    public function setDisplayTaxRate($display_tax_rate)
    {

        $this->container['display_tax_rate'] = $display_tax_rate;

        return $this;
    }


    /**
     * Gets effective_rate
     *
     * @return double|null
     */
    public function getEffectiveRate()
    {
        return $this->container['effective_rate'];
    }

    /**
     * Sets effective_rate
     *
     * @param double|null $effective_rate Effective Tax Rate (decimal to 4dp) e.g 12.5000
     *
     * @return $this
     */
    public function setEffectiveRate($effective_rate)
    {

        $this->container['effective_rate'] = $effective_rate;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
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
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            AccountingObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


