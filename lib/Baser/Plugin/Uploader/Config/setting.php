<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Uploader.Config
 * @since			baserCMS v 3.0.10
 * @license			http://basercms.net/license/index.html
 */

/**
 * システムナビ
 */
$config['BcApp.adminNavigation'] = [
	'Plugins' => [
		'menus' => [
			'UploaderConfigs' => ['title' => 'アップローダー基本設定', 'url' => ['admin' => true, 'plugin' => 'uploader', 'controller' => 'uploader_configs', 'action' => 'index']],
		]
	],
	'Contents' => [
		'Uploader' => [
			'title' => __d('baser', 'アップロード管理'),
			'type' => 'contents',
			'menus' => [
				'UplaoderFiles' => ['title' => __d('baser', 'アップロードファイル'), 'url' => ['admin' => true, 'plugin' => 'uploader', 'controller' => 'uploader_files', 'action' => 'index']],
				'UploaderCategories' => ['title' => __d('baser', 'カテゴリ'), 'url' => ['admin' => true, 'plugin' => 'uploader', 'controller' => 'uploader_categories', 'action' => 'index']],
			]
		],
	],
];
// @deprecated 5.0.0 since 4.2.0 BcApp.adminNavigation の形式に変更
$config['BcApp.adminNavi.uploader'] = [
		'name'		=> 'アップローダープラグイン',
		'contents'	=> [
			['name' => 'アップロードファイル一覧',	'url' => ['admin' => true, 'plugin' => 'uploader', 'controller' => 'uploader_files', 'action' => 'index']],
			['name' => 'カテゴリ一覧', 'url' => ['admin' => true, 'plugin' => 'uploader', 'controller' => 'uploader_categories', 'action' => 'index']],
			['name' => 'カテゴリ新規登録', 'url' => ['admin' => true, 'plugin' => 'uploader', 'controller' => 'uploader_categories', 'action' => 'add']],
			['name' => '基本設定', 'url' => ['admin' => true, 'plugin' => 'uploader', 'controller' => 'uploader_configs', 'action' => 'index']],
	]
];
