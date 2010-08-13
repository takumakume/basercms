<?php
/* SVN FILE: $Id$ */
/**
 * テーマコントローラー
 *
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2010, Catchup, Inc.
 *								9-5 nagao 3-chome, fukuoka-shi
 *								fukuoka, Japan 814-0123
 *
 * @copyright		Copyright 2008 - 2010, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			baser.controllers
 * @since			Baser v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
class ThemesController extends AppController {
/**
 * コントローラー名
 * @var		string
 * @access	public
 */
	var $name = 'Themes';
/**
 * モデル
 * @var		array
 * @access	public
 */
	var $uses = array('Page');
/**
 * コンポーネント
 *
 * @var     array
 * @access  public
 */
	var $components = array('Auth','Cookie','AuthConfigure');
/**
 * パンくずナビ
 * @var array
 */
	var $navis = array('システム設定'=>'/admin/site_configs/form', 'テーマ管理'=>'/admin/themes/index');
/**
 * テーマ一覧
 *
 * @return	void
 * @access	public
 */
	function admin_index(){

		$this->pageTitle = 'テーマ一覧';
		$path = WWW_ROOT.'themed';
		$folder = new Folder($path);
		$files = $folder->read(true,true);
		foreach($files[0] as $themename){
			if($themename != 'core'){
				$themeName = $title = $description = $author = $url = $screenshot = '';
				if(file_exists($path.DS.$themename.DS.'config.php')){
					include $path.DS.$themename.DS.'config.php';
				}
				if(file_exists($path.DS.$themename.DS.'screenshot.png')){
					$theme['screenshot'] = true;
				}else{
					$theme['screenshot'] = false;
				}
				$theme['name'] = $themename;
				$theme['title'] = $title;
				$theme['description'] = $description;
				$theme['author'] = $author;
				$theme['url'] = $url;
				$themes[] = $theme;
			}
		}
		$themes[] = array('name'=>'core','title'=>'BaserCMSコア','description'=>'BaserCMSのコアファイル。現在のテーマにコピーして利用する事ができます。','author'=>'basercms','url'=>'http://basercms.net');
		$this->set('themes',$themes);
		$this->subMenuElements = array('themes');

	}
/**
 * テーマをコピーする
 *
 * @param	string	$theme
 * @return	void
 * @access	public
 */
	function admin_copy($theme){

		if(!$theme){
			$this->notFound();
		}
		$path = WWW_ROOT.'themed'.DS.$theme;
		$newPath = $path.'_copy';
		while(true){
			if(!is_dir($newPath)){
				break;
			}
			$newPath .= '_copy';
		}
		$folder = new Folder();
		$folder->copy(array('from'=>$path,'to'=>$newPath,'chmod'=>0777,'skip'=>array('_notes')));
		$this->Session->setFlash('テーマ「'.$theme.'」をコピーしました。');
		$this->redirect(array('action'=>'index'));

	}
/**
 * テーマを削除する
 *
 * @param	string	$theme
 * @return	void
 * @access	public
 */
	function admin_del($theme){

		if(!$theme){
			$this->notFound();
		}
		$path = WWW_ROOT.'themed'.DS.$theme;
		$folder = new Folder();
		$folder->delete($path);
		if($theme == $siteConfig['SiteConfig']['theme']){
			$siteConfig['SiteConfig']['theme'] = '';
			$SiteConfig = ClassRegistry::getObject('SiteConfig');
			$SiteConfig->saveKeyValue($siteConfig);
		}
		clearViewCache();
		$this->Session->setFlash('テーマ「'.$theme.'」を削除しました。');
		$this->redirect(array('action'=>'index'));

	}
/**
 * テーマを適用する
 *
 * @param	string	$theme
 * @return	void
 * @access	public
 */
	function admin_apply($theme){
		if(!$theme){
			$this->notFound();
		}
		$siteConfig['SiteConfig']['theme'] = $theme;
		$SiteConfig = ClassRegistry::getObject('SiteConfig');
		$SiteConfig->saveKeyValue($siteConfig);
		clearViewCache();
		if(!$this->Page->createAllPageTemplate()){
				$this->Session->setFlash('テーマ変更中にページテンプレートの生成に失敗しました。<br />表示できないページはページ管理より更新処理を行ってください。');
		} else {
			$this->Session->setFlash('テーマ「'.$theme.'」を適用しました。');
		}
		$this->redirect(array('action'=>'index'));
	}

}
?>