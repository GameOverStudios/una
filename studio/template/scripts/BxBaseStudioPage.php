<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaView UNA Studio Representation classes
 * @ingroup     UnaStudio
 * @{
 */

class BxBaseStudioPage extends BxDolStudioPage
{
    function __construct($mixedPageName)
    {
        parent::__construct($mixedPageName);
    }

    public function getPageIndex()
    {
        if(!is_array($this->aPage) || empty($this->aPage))
            return BX_PAGE_DEFAULT;

        if(!$this->bPageMultiple)
            return !empty($this->aPage['index']) ? (int)$this->aPage['index'] : BX_PAGE_DEFAULT;
        else
            return !empty($this->aPage[$this->sPageSelected]['index']) ? (int)$this->aPage[$this->sPageSelected]['index'] : BX_PAGE_DEFAULT;

        $this->aMarkers = array_merge($this->aMarkers, array(
            'js_object' => $this->getPageJsObject(),
        ));
    }

    public function getPageJs()
    {
        return array('jquery.anim.js', 'jquery.jfeed.pack.js', 'jquery.dolRSSFeed.js', 'page.js');
    }

    public function getPageJsClass()
    {
        return 'BxDolStudioPage';
    }

    public function getPageJsObject()
    {
        return 'oBxDolStudioPage';
    }

    public function getPageJsCode($aOptions = array(), $bWrap = true)
    {
        $sJsClass = $this->getPageJsClass();
        $sJsObject = $this->getPageJsObject();
        if(empty($sJsClass) || empty($sJsObject))
            return '';

        $sOptions = '{}';
        if(!empty($aOptions))
            $sOptions = json_encode($aOptions);

        $sContent = 'var ' . $sJsObject . ' = new ' . $sJsClass . '(' . $sOptions . ');';
        if($bWrap)
            $sContent = BxDolStudioTemplate::getInstance()->_wrapInTagJsCode($sContent);

        return $sContent;
    }

    public function getPageCss()
    {
        return array(
            'page.css', 
            'page-media-tablet.css', 
            'page-media-desktop.css', 
            'page_columns.css',
            'menu_top.css'
        );
    }

    public function getPageHeader()
    {
        if(empty($this->aPage) || !is_array($this->aPage))
            return '';

        return _t(!$this->bPageMultiple ? $this->aPage['caption'] : $this->aPage[$this->sPageSelected]['caption']);
    }

    public function getPageBreadcrumb()
    {
        $bWidgetType = !empty($this->aPage['wid_type']);

        $aMarkers = array('js_object_launcher' => BxTemplStudioLauncher::getInstance()->getPageJsObject());
        if($bWidgetType)
            $aMarkers['widget_type'] = $this->aPage['wid_type'];

        $this->addMarkers($aMarkers);

        $aMenuItems = array(
            'home' => array(
                'name' => 'home',
                'icon' => 'bc-home.svg',
                'link' => 'javascript:void(0)',
                'onclick' => bx_replace_markers('return {js_object_launcher}.browser(this)', $this->aMarkers),
                'title' => ''
            )
        );

        if($bWidgetType)
            $aMenuItems['type'] = array(
                'name' => 'type',
                'icon' => $this->getPageTypeIcon(),
                'link' => $this->getPageTypeUrl(),
                'onclick' => bx_replace_markers("return {js_object_launcher}.browser(this, '{widget_type}')", $this->aMarkers),
                'title' => ''
            );

        $aMenuItems['page'] = array(
            'name' => 'page',
            'icon' => $this->aPage['icon'],
            'link' => $this->getPageUrl(),
            'title' => _t($this->aPage['caption'])
        );       

        $oMenu = new BxTemplStudioMenu(array(
            'template' => 'page_breadcrumb.html',
            'menu_items' => $aMenuItems
        ));

        return $oMenu->getCode();
    }

    public function getPageCaption()
    {
        return '';
    }

    public function getPageAttributes()
    {
        return '';
    }

    public function getPageMenu($aMenu = array(), $aMarkers = array())
    {
        $oMenu = $this->getPageMenuObject($aMenu, $aMarkers);
        return $oMenu->getCode();
    }

    public function getPageCode($sPage = '', $bWrap = true) {
        if(empty($this->aPage) || !is_array($this->aPage)) {
            $this->setError('_sys_txt_not_found');
            return false;
        }

        return '';
    }

    protected function getPageMenuObject($aMenu = array(), $aMarkers = array())
    {
        $oMenu = new BxTemplStudioMenu(array('template' => 'menu_side.html', 'menu_items' => $aMenu));
        if(!empty($aMarkers))
            $oMenu->addMarkers($aMarkers);

        return $oMenu;
    }

    protected function getPageCaptionHelp()
    {
    	$sContent = BxDolRss::getObjectInstance($this->sPageRssHelpObject)->getHolder($this->sPageRssHelpId, $this->iPageRssHelpLength, 0, false);

        $oTemplate = BxDolStudioTemplate::getInstance();
    	$oTemplate->addJsTranslation('_adm_txt_show_help_content_empty');
        return $oTemplate->parseHtmlByName('page_caption_help.html', array(
            'content' => $sContent
        ));
    }

    protected function getJsResult($sMessage, $bTranslate = true, $bRedirect = false, $sRedirect = '', $sOnResult = '')
    {
        return $this->getJsResultBy(array(
            'message' => $sMessage,
            'translate' => $bTranslate,
            'redirect' => $bRedirect === true && !empty($sRedirect) ? $sRedirect : $bRedirect,
            'eval' => $sOnResult
        ));
    }

    protected function getJsResultBy($aParams)
    {
        $aResult = array();

        if(!empty($aParams['message'])) {
            $aResult['message'] = $aParams['message'];

            if(!isset($aParams['translate']) || !empty($aParams['translate'])) {
                $aTrtParams = array($aResult['message']);
                if(!empty($aParams['translate']) && is_array($aParams['translate']))
                    $aTrtParams = array_merge($aTrtParams, $aParams['translate']);

                $aResult['message'] = call_user_func_array ('_t', $aTrtParams);
            }
        }

        if(isset($aParams['redirect']) && $aParams['redirect'] !== false)
            $aResult['redirect'] = is_string($aParams['redirect']) ? $aParams['redirect'] : BX_DOL_URL_STUDIO;

        if(!empty($aParams['eval']))
            $aResult['eval'] = $aParams['eval'];

        $sResult = "window.parent.processJsonData(" . json_encode($aResult) . ");";
        if(isset($aParams['on_page_load']) && $aParams['on_page_load'] === true)
            $sResult = "$(document).ready(function() {" . $sResult . "});";

        return BxDolStudioTemplate::getInstance()->_wrapInTagJsCode($sResult);
    }
}

/** @} */
