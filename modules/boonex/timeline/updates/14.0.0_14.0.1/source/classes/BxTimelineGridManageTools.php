<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    Timeline Timeline
 * @ingroup     UnaModules
 * 
 * @{
 */

class BxTimelineGridManageTools extends BxBaseModGeneralGridAdministration
{
    public function __construct ($aOptions, $oTemplate = false)
    {
        parent::__construct ($aOptions, $oTemplate);
    }

    public function performActionDelete($aParams = array())
    {
    	$CNF = &$this->_oModule->_oConfig->CNF;

        $iAffected = 0;
        $aIds = bx_get('ids');
        if(!$aIds || !is_array($aIds)) {
            echoJson(array());
            exit;
        }

        $aIdsAffected = [];
        foreach($aIds as $iId) {
            $aContentInfo = $this->_oModule->_oDb->getEvents(['browse' => 'id', 'value' => $iId]);
            if($this->_oModule->isAllowedDelete($aContentInfo) === true && $this->_oModule->deleteEvent($aContentInfo)) {
                $aIdsAffected[] = $iId;
                $iAffected++;
            }
        }

        echoJson($iAffected ? array('grid' => $this->getCode(false), 'blink' => $aIdsAffected) : array('msg' => _t($CNF['T']['grid_action_err_delete'])));
    }

    protected function _getActionDelete($sType, $sKey, $a, $isSmall = false, $isDisabled = false, $aRow = array())
    {
        if($sType == 'single' && $this->_sManageType == BX_DOL_MANAGE_TOOLS_ADMINISTRATION && $this->_oModule->isAllowedDelete($aRow) !== true)
            return '';

        
        if (bx_is_api()){
            return array_merge($a, ['type' => 'callback', 'on_callback' => 'hide_row', 'params' => '&id=' . $aRow[$this->_aOptions['field_id']] ]);
        }
    	return $this->_getActionDefault($sType, $sKey, $a, $isSmall, $isDisabled, $aRow);
    }

    protected function _getCellDescription($mixedValue, $sKey, $aField, $aRow)
    {
        $iProfile = $this->_oModule->_oConfig->isSystem($aRow['type'], $aRow['action']) ? $aRow['owner_id'] : $aRow['object_id'];
        $oProfile = $this->_getProfileObject($iProfile);

        $mixedValue = $this->_oTemplate->parseHtmlByName('grid_link.html', array(
            'href' => $this->_oModule->serviceGetLink($aRow['id']),
            'title' => bx_replace_markers($aRow['description'], array(
                'profile_name' => $oProfile->getDisplayName()
            ))
        ));

        return parent::_getCellDefault($mixedValue, $sKey, $aField, $aRow);
    }

    protected function _getCellDate($mixedValue, $sKey, $aField, $aRow)
    {
        return parent::_getCellDefault(bx_time_js($mixedValue), $sKey, $aField, $aRow);
    }

    protected function _switcherChecked2State($isChecked)
    {
        return $isChecked ? 'active' : 'hidden';
    }

    protected function _switcherState2Checked($mixedState)
    {
        return 'active' == $mixedState ? true : false;
    }

    protected function _enable ($mixedId, $isChecked)
    {
        $bResult = parent::_enable($mixedId, $isChecked);
        if(!$bResult) 
            return $bResult;
        
        $aEvent = $this->_oModule->_oDb->getEvents(['browse' => 'id', 'value' => (int)$mixedId]);
        if(empty($aEvent) || !is_array($aEvent))
            return $bResult;

        $this->_oModule->{$isChecked ? 'onUnhide' : 'onHide'}($aEvent);

        return $bResult;
    }
}

/** @} */
