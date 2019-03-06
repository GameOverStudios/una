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

class BxTimelineUploaderSimpleVideo extends BxBaseModTextUploaderSimple
{
    public function __construct ($aObject, $sStorageObject, $sUniqId, $oTemplate)
    {
        $this->_sModule = 'bx_timeline';

        parent::__construct($aObject, $sStorageObject, $sUniqId, $oTemplate);

        $this->_oTemplate = $this->_oModule->_oTemplate;
    }
}

/** @} */
