<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View.Helper
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * Include files
 */
App::uses('AppHelper', 'View/Helper');

/**
 * BcAdminヘルパー
 *
 * @package Baser.View.Helper
 */
class BcAdminHelper extends AppHelper {

/**
 * ヘルパー
 *
 * @var array
 */
	public $helpers = ['BcBaser', 'Session'];

/**
 * 管理システムグローバルメニューの利用可否確認
 * 
 * @return boolean
 */
	public function isAdminGlobalmenuUsed() {
		if (!BC_INSTALLED) {
			return false;
		}
		if (Configure::read('BcRequest.isUpdater')) {
			return false;
		}
		$user = $this->_View->get('user');
		if (!$user) {
			return false;
		}
		$UserGroup = ClassRegistry::init('UserGroup');
		return $UserGroup->isAdminGlobalmenuUsed($user['user_group_id']);
	}

/**
 * ログインユーザーがシステム管理者かチェックする
 * 
 * @return boolean 
 */
	public function isSystemAdmin() {
		$user = $this->_View->getVar('user');
		if (empty($this->request->params['admin']) || !$user) {
			return false;
		}
		if ($user['user_group_id'] == Configure::read('BcApp.adminGroupId')) {
			return true;
		}
		return false;
	}

/**
 * JSON形式でメニューデータを取得する
 * @return string
 */
	public function getJsonMenu() {
		$adminMenuGroups = Configure::read('BcApp.adminNavigation');

		// print_r($adminMenuGroups);exit;
		$currentSiteId = $this->Session->read('ContentsAdminIndex.named.site_id');
		if(!$adminMenuGroups) {
			return null;
		}
		if(empty($this->_View->viewVars['user']['user_group_id'])) {
			return null;
		}
		if(!is_null($currentSiteId)) {
			$currentSiteId = (int) $currentSiteId;
		} else {
			$currentSiteId = 0;
		}
		$currentUrl = '/' . $this->request->url;
		$params = null;
		if(strpos($currentUrl, '?') !== false) {
			list($currentUrl, $params) = explode('?', $currentUrl);
		}
		$currentUrl = preg_replace('/\/index$/', '/', $currentUrl);
		if($params) {
			$currentUrl .= '?' . $params;
		}
		if(!$this->request->params['plugin']) {
			$currentGroupUrl = '/' . Configure::read('Routing.prefixes.0') . '/' . $this->request->params['controller'] . '/';
		} else {
			$currentGroupUrl = '/' . Configure::read('Routing.prefixes.0') . '/' . $this->request->params['plugin'] . '/' . $this->request->params['controller'] . '/';
		}
		$contents = $adminMenuGroups['Contents'];
		$systems = $adminMenuGroups['Systems'];
		$plugins = $adminMenuGroups['Plugins'];
		unset($adminMenuGroups['Contents'], $adminMenuGroups['Systems'], $adminMenuGroups['Plugins']);
		if($plugins) {
			foreach($plugins['menus'] as $plugin) {
				$systems['Plugin']['menus'][] = $plugin;
			}
		}
		$adminMenuGroups = $contents + $adminMenuGroups + $systems;
		$Permission = ClassRegistry::init('Permission');
		$covertedAdminMenuGroups = [];
		foreach($adminMenuGroups as $group => $adminMenuGroup) {
			$adminMenuGroup = array_merge(['current' => false], $adminMenuGroup);
			if(!isset($adminMenuGroup['siteId'])) {
				$adminMenuGroup = array_merge(['siteId' => null], $adminMenuGroup);
			} else {
				$adminMenuGroup['siteId'] = (int) $adminMenuGroup['siteId'];
			}
			if(!isset($adminMenuGroup['type'])) {
				$adminMenuGroup = array_merge(['type' => null], $adminMenuGroup);
			}
			$adminMenuGroup = array_merge(['name' => $group], $adminMenuGroup);
			if(!empty($adminMenuGroup['url'])) {
				$adminMenuGroup['url'] = preg_replace('/^' . preg_quote($this->request->base, '/') . '\//', '/', $this->BcBaser->getUrl($adminMenuGroup['url']));
				if(preg_match('/^' . preg_quote($adminMenuGroup['url'], '/') . '$/', $currentUrl)) {
					$adminMenuGroup['current'] = true;
				}
			}

			$covertedAdminMenus = [];
			if(!empty($adminMenuGroup['menus'])) {
				$current = false;
				$groupCurrent = false;
				$i = 0;
				foreach($adminMenuGroup['menus'] as $menu => $adminMenu) {
					$adminMenu['name'] = $menu;
					$url = $this->BcBaser->getUrl($adminMenu['url']);
					$url = preg_replace('/^' . preg_quote($this->request->base, '/') . '\//', '/', $url);
					if ($Permission->check($url, $this->_View->viewVars['user']['user_group_id'])) {
						if(empty($adminMenuGroup['url'])) {
							$adminMenuGroup['url'] = $url;
						}
						$groupUrlReg = [];
						if(!$adminMenu['url']['plugin']) {
							$groupUrlReg[] = preg_quote('/' . Configure::read('Routing.prefixes.0') . '/' . $adminMenu['url']['controller'] . '/', '/');
						} else {
							$groupUrlReg[] = preg_quote('/' . Configure::read('Routing.prefixes.0') . '/' . $adminMenu['url']['plugin'] . '/' . $adminMenu['url']['controller'] . '/', '/');
						}
						if(!empty($adminMenu['controllerAsCurrent'])) {
							if(!$adminMenu['url']['plugin']) {
								$groupUrlReg[] = preg_quote('/' . Configure::read('Routing.prefixes.0') . '/' . $adminMenu['controllerAsCurrent'] . '/', '/');
							} else {
								$groupUrlReg[] = preg_quote('/' . Configure::read('Routing.prefixes.0') . '/' . $adminMenu['url']['plugin'] . '/' . $adminMenu['controllerAsCurrent'] . '/', '/');
							}
						}
						if($groupUrlReg) {
							$groupUrlReg = '/^(' . implode('|', $groupUrlReg) . ')$/';
						}
						$adminMenu['url'] = $url;
						if(preg_match('/^' . preg_quote($url, '/') . '$/', $currentUrl)) {
							$current = $i;
						}
						if($groupUrlReg && $groupCurrent === false && preg_match($groupUrlReg, $currentGroupUrl)) {
							$groupCurrent = $i;
						}
						$adminMenu['current'] = false;
						$covertedAdminMenus[$i] = $adminMenu;
					}
					$i++;
				}
				if($current !== false || $groupCurrent !== false) {
					if($current !== false) {
						$currentMenu = $current;
					} else {
						$currentMenu = $groupCurrent;
					}
					$covertedAdminMenus[$currentMenu]['current'] = true;
					$adminMenuGroup['current'] = false;
					$adminMenuGroup['expanded'] = true;
				}
			}
			$adminMenuGroup['menus'] = $covertedAdminMenus;
			$covertedAdminMenuGroups[] = $adminMenuGroup;
		}
		$menuSettings = [
			'currentSiteId' => $currentSiteId,
			'menuList' => $covertedAdminMenuGroups
		];
		return json_encode($menuSettings);
	}

/**
 * 管理画面の画面タイトルの横に配置するボタンをを追加する
 *
 * @param array $links ['url' => string or array, 'confirm' => 'confirm message', 'something attributes' => 'attr value']
 */
	public function addAdminMainBodyHeaderLinks($links) {
		$mainBodyHeaderLinks = $this->_View->get('mainBodyHeaderLinks');
		if($mainBodyHeaderLinks === null) {
			$mainBodyHeaderLinks = [];
		}
		$mainBodyHeaderLinks[] = $links;
		$this->_View->set('mainBodyHeaderLinks', $mainBodyHeaderLinks);
	}

}
