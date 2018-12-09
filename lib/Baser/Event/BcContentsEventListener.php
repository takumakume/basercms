<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Event
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * baserCMS Contents Event Listener
 *
 * 階層コンテンツと連携したフォーム画面を表示する為のイベント
 * BcContentsComponent でコントロールされる
 *
 * @package Baser.Event
 */
class BcContentsEventListener extends CakeObject implements CakeEventListener {

/**
 * Implemented Events
 *
 * @return array
 */
	public function implementedEvents() {
		return [
			'Helper.Form.beforeCreate' => ['callable' => 'formBeforeCreate'],
			'Helper.Form.afterCreate' => ['callable' => 'formAfterCreate'],
			'Helper.Form.afterSubmit' => ['callable' => 'formAfterSubmit']
		];
	}

/**
 * Form Before Create
 *
 * @param CakeEvent $event
 */
	public function formBeforeCreate(CakeEvent $event) {
		if(!BcUtil::isAdminSystem()) {
			return;
		}
		$event->data['options']['type'] = 'file';
	}

/**
 * Form After Create
 *
 * @param CakeEvent $event
 * @return string
 */
	public function formAfterCreate(CakeEvent $event) {
		if(!BcUtil::isAdminSystem()) {
			return;
		}
		$View = $event->subject();
		if($event->data['id'] == 'FavoriteAdminEditForm' || $event->data['id'] == 'PermissionAdminEditForm') {
			return;
		}
		if(!preg_match('/(AdminEditForm|AdminEditAliasForm)$/', $event->data['id'])) {
			return;
		}
		return $event->data['out'] . "\n" . $View->element('admin/content_fields');
	}

/**
 * Form After Submit
 *
 * フォームの保存ボタンの前後に、一覧、プレビュー、削除ボタン、その他のエレメントを配置する
 * プレビューを配置する場合は、コンテンツの設定にて、preview を true にする
 *
 * @param CakeEvent $event
 * @return string
 */
	public function formAfterSubmit(CakeEvent $event) {
		if(!BcUtil::isAdminSystem()) {
			return $event->data['out'];
		}
		/* @var BcAppView $View */
		$View = $event->subject();
		$data = $View->request->data;
		if(!preg_match('/(AdminEditForm|AdminEditAliasForm)$/', $event->data['id'])) {
			return $event->data['out'];
		}
		$setting = Configure::read('BcContents.items.' . $data['Content']['plugin'] . '.' . $data['Content']['type']);
		// 一覧
		$outputArray = [
			$View->BcHtml->link(__d('baser', '一覧に戻る'), ['plugin' => '', 'admin' => true, 'controller' => 'contents', 'action' => 'index'], ['class' => 'button bca-btn', 'data-bca-btn-type' => 'back-to-list']),
		];
		if (!empty($setting['preview']) && $data['Content']['type'] != 'ContentFolder') {
			$outputArray[] = $View->BcForm->button(__d('baser', 'プレビュー'), ['class' => 'button bca-btn', 'data-bca-btn-type'=>'preview', 'id' => 'BtnPreview']);
		}
		// 既存のボタン
		$outputArray[] = $event->data['out'];
		$outputArray = [$View->Html->div('bca-actions__main', implode("\n", $outputArray))];
		// 削除ボタン
		if(empty($data['Content']['site_root'])) {
			if($data['Content']['alias_id']) {
				$deleteText = __d('baser', '削除');
			} else {
				$deleteText = __d('baser', 'ゴミ箱');
			}
			$PermissionModel = ClassRegistry::init('Permission');
			if ($PermissionModel->check('/' . Configure::read('Routing.prefixes.0') . '/contents/delete', $View->viewVars['user']['user_group_id'])) {
				$outputArray[] = $View->Html->div('bca-actions__sub', $View->BcForm->button($deleteText, [
					'data-bca-btn-type' => 'delete',
					'data-bca-btn-size' => 'sm',
					'data-bca-btn-color' => 'danger',
					'class' => 'button bca-btn', 
					'id' => 'BtnDelete'
				]));
			}
		}
		$outputArray = [$View->Html->div('bca-actions', implode("\n", $outputArray))];
		// その他エレメント（先頭に追加）
		array_unshift($outputArray,
      $View->element('admin/content_options')
    );
		// 送信ボタン系の後に「関連コンテンツ」「その他情報」を表示
    $outputArray = array_merge( $outputArray,
      [
        $View->element('admin/content_related'),
        $View->element('admin/content_info')
      ]
    );

		$event->data['out'] = implode("\n", $outputArray);
		return $event->data['out'];
	}

}