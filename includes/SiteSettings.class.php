<?php


/**
 *
 * Description
 *
 *
 * @name			PACKAGE NAME
 * @see				PACKAGE REFFER URL
 * @package			PACKAGE
 * @subpackage		SUBPACKAGE
 * @author			Mahdi Pedramrazi
 * @category		backend
 * @access			Mexo Programming Team
 * @version			1.0
 * @since			  Dec 21, 2010
 * @copyright		Mexo LLC
 *
 * @example
 * <code>
 * <?php
 *
 * ?>
 * </code>
 *
 */


class SiteSettings {
	
	public static  $tools;
	public function __construct(){}
	
	public function setTemplate(){
		
		//LiteFrame::SetTemplateFolderName("default");
		//LiteFrame::SetTemplateColorName("dark");
		self::$tools= new Tools();
		
	}/* </ SetTemplate > */
	
	public function setTemplateColor(){
		
		LiteFrame::IncludeStyle('common.css');
		
	} /* </ SetTemplateColor > */
	
	public function setCoreJavascript(){
		
		//LiteFrame::IncludeLibraryJavascript('plugins/jquery.gotop.js');
		//LiteFrame::IncludeJavascript('default.js');
		
		if( LiteFrame::getActiveAction() === 'cleaning' ){
			LiteFrame::IncludeJavascript('plugins.js');
		}
		
		
	} /* </ SetCoreJavascript > */
	
} /* </ SiteSettings > */
	
?>