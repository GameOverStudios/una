<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaCore UNA Core
 * @{
 */

class BxDolAIProvider extends BxDol
{
    protected $_oDb;
    protected $_iId;
    protected $_sName;
    protected $_sCaption;
    protected $_sPrefix;
    protected $_aOptions;

    public function __construct($aProvider)
    {
        parent::__construct();

        if(empty($aProvider) || !is_array($aProvider) || strcmp($aProvider['type']['name'], $this->_sName) != 0)
            $this->_log("Unexpected value provided for the credentials");

        $this->_oDb = new BxDolAIQuery();

        $this->_iId = (int)$aProvider['id'];
        $this->_sName = $aProvider['type']['name'];
        $this->_sCaption = _t($aProvider['title']);
        $this->_sPrefix = $aProvider['type']['option_prefix'];

        $this->_aOptions = [];
        if(!empty($aProvider['options']) && is_array($aProvider['options']))
            $this->initOptions($aProvider['options']);
    }

    /**
     * Get provider object instance by provider ID
     * @param $sProvider provider name
     * @return object instance or false on error
     */
    public static function getObjectInstance($iId)
    {
        $sPrefix = 'BxDolAIProvider!';

        if(isset($GLOBALS['bxDolClasses'][$sPrefix . $iId]))
            return $GLOBALS['bxDolClasses'][$sPrefix . $iId];

        $aProvider = BxDolAIQuery::getProviderObject($iId);
        if(!$aProvider || !is_array($aProvider))
            return false;

        $sClass = 'BxDolAIProvider';
        if(!empty($aProvider['type']['class_name'])) {
            $sClass = $aProvider['type']['class_name'];
            if(!empty($aProvider['type']['class_file']))
                require_once(BX_DIRECTORY_PATH_ROOT . $aProvider['type']['class_file']);
        }

        $o = new $sClass($aProvider);
        return ($GLOBALS['bxDolClasses'][$sPrefix . $iId] = $o);
    }

    public function initOptions($aOptions)
    {
    	$this->_aOptions = $aOptions;
    }

    public function getOption($sName)
    {
    	if(substr($sName, 0, strlen($this->_sPrefix)) != $this->_sPrefix)
            $sName = $this->_sPrefix . $sName;

        return isset($this->_aOptions[$sName]) ? $this->_aOptions[$sName]['value'] : '';
    }

    public function processActionWebhook()
    {
        // Should be overwritten to process webhooks.
    }

    public function call($sRequest, $aParams, $sMethod = 'post-json', $aHeaders = [])
    {
        // Should be overwritten to process calls.
    }

    /**
     * Internal methods.
     */
    protected function _log($sMessage, $bUseLog = false)
    {
        if($bUseLog) {
            //TODO: Use bx_log here.
        }
        else
            throw new Exception($sMessage);

        return false;
    }    
}
