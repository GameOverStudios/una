<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) BoonEx Pty Limited - http://www.boonex.com/
 * CC-BY License - http://creativecommons.org/licenses/by/3.0/
 *
 * @defgroup    DolphinView Dolphin Studio Representation classes
 * @ingroup     DolphinStudio
 * @{
 */

define('BX_DOL_STUDIO_LAUNCHER_JS_OBJECT', 'oBxDolStudioLauncher');

bx_import('BxDolStudioLauncher');
bx_import('BxDolStudioTemplate');

class BxBaseStudioLauncher extends BxDolStudioLauncher
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPageIndex()
    {
        if(!is_array($this->aPage || empty($this->aPage)))
            return BX_PAGE_DEFAULT;

        return !empty($this->aPage[$this->sPageSelected]) ? $this->aPage[$this->sPageSelected]->getPageIndex() : BX_PAGE_DEFAULT;
    }

    public function getPageJs()
    {
        $aJs = array(
            'jquery-ui/jquery.ui.core.min.js',
            'jquery-ui/jquery.ui.widget.min.js',
            'jquery-ui/jquery.ui.mouse.min.js',
            'jquery-ui/jquery.ui.sortable.min.js',
            'jquery.ui.touch-punch.min.js',
            'jquery.easing.js',
            'jquery.cookie.min.js',
            'launcher.js'
        );
        foreach($this->aIncludes as $sName => $oInclude)
            $aJs = array_merge($aJs, $oInclude->getJs());

        return $aJs;
    }

    public function getPageJsObject()
    {
        return BX_DOL_STUDIO_LAUNCHER_JS_OBJECT;
    }

    public function getPageCss()
    {
        $aCss = array('launcher.css');
        foreach($this->aIncludes as $sName => $oInclude)
            $aCss = array_merge($aCss, $oInclude->getCss());

        return $aCss;
    }

    public function getPageCode($bHidden = false)
    {
        if(empty($this->aPage) || !is_array($this->aPage))
            return '';

        $sIncludes = '';
        foreach($this->aIncludes as $sName => $oInclude)
            $sIncludes .= $oInclude->getJsCode();

        return BxDolStudioTemplate::getInstance()->parseHtmlByName('launcher.html', array(
            'js_object' => $this->getPageJsObject(),
            'includes' => $sIncludes,
            'items' => parent::getPageCode($bHidden)
        ));
    }

	public function serviceGetCacheUpdater()
	{
		check_logged();
		if(!isAdmin())
    		return '';

		$oTemplate = BxDolStudioTemplate::getInstance();
		$sContent = $oTemplate->addJs('launcher.js', true);
		$sContent .= $oTemplate->parseHtmlByName('launcher_cache_updater.html', array(
    		'js_object' => $this->getPageJsObject()
    	));

    	return $sContent;
    }
}

/** @} */
