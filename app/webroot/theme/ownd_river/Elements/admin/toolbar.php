<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 4.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] ツールバー
 */
// JSの出力について、ツールバーはフロントエンドでも利用するため、inlineに出力する
$this->BcBaser->js(array('admin/vendors/outerClick', 'admin/vendors/jquery.fixedMenu', 'admin/toolbar'));
App::uses('AuthComponent', 'Controller/Component');
$loginUrl = '';
$currentAuthPrefix = Configure::read('BcAuthPrefix.' . $currentPrefix);
if (!empty($currentAuthPrefix['loginAction'])) {
	$loginUrl = preg_replace('/^\//', '', $currentAuthPrefix['loginAction']);
}
if (in_array('admin', $currentUserAuthPrefixes)) {
	$logoutAction = Configure::read('BcAuthPrefix.admin.logoutAction');
} else {
	$logoutAction = $currentAuthPrefix['logoutAction'];
}
if (!empty($currentAuthPrefix['name']) && $currentPrefix != 'front') {
	$authName = $currentAuthPrefix['name'];
} elseif (isset($this->BcBaser->siteConfig['formal_name'])) {
	$authName = $this->BcBaser->siteConfig['formal_name'];
} else {
	$authName = '';
}
?>


<div id="ToolBar" class="bca-toolbar">
	<div id="ToolbarInner" class="clearfix bca-toolbar__body">
		<div class="bca-toolbar__logo">
			<?php
				# インストール画面
				if ($this->name == 'Installations'): ?>
				<?php $this->BcBaser->link(__d('baser', 'インストールマニュアル'), 'http://basercms.net/manuals/introductions/4.html', ['target' => '_blank', 'class' => 'bca-toolbar__link']) ?>
			<?php
				# TODO: どういうケースか不明
				elseif (Configure::read('BcRequest.isUpdater')): ?>
				<?php $this->BcBaser->link(__d('baser', 'アップデートマニュアル'), 'http://basercms.net/manuals/introductions/8.html', ['target' => '_blank', 'class' => 'bca-toolbar__link']) ?>
			<?php
				# 通常
				elseif (!empty($this->request->params['admin']) || ('/' . $this->request->url) == $loginUrl): ?>
				<?php
					$this->BcBaser->link(
						$this->BcBaser->getImg('/theme/ownd_river/img/admin/logo_icon.svg', ['alt' => '', 'width' => '24', 'height' => '21', 'class' => 'bca-toolbar__logo-symbol'])
							.'<span class="bca-toolbar__logo-text">'
							.$this->BcBaser->siteConfig['formal_name']
							.'</span>', '/'
						,
						['class' => 'bca-toolbar__logo-link']
					)
				?>
			<?php
				# TODO: どういうケースか不明
				else: ?>
				<?php if (in_array('admin', $currentUserAuthPrefixes)): ?>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_logo.png', array('alt' => __d('baser', 'baserCMS管理システム'), 'class' => 'bc-btn')), array('plugin' => null, 'admin' => true, 'controller' => 'dashboard', 'action' => 'index'), array('title' => __d('baser', 'baserCMS管理システム'))) ?>
				<?php else: ?>
					<?php $this->BcBaser->link($authName, Configure::read('BcAuthPrefix.' . $currentPrefix . '.loginRedirect'), array('title' => $authName)) ?>
				<?php endif ?>
			<?php endif ?>
		</div>
		<div id="ToolMenu" class="bca-toolbar__tools">
			<?php if ($this->BcBaser->existsEditLink()): ?>
				<div class="bca-toolbar__tools-edit">
					<?php $this->BcBaser->editLink() ?>
				</div>
			<?php endif ?>
			<?php if ($this->BcBaser->existsPublishLink()): ?>
				<div class="bca-toolbar__tools-edit">
					<?php $this->BcBaser->publishLink() ?>
				</div>
			<?php endif ?>
			<?php if (!$loginUrl || $this->request->url != $loginUrl): ?>
				<div class="bca-toolbar__tools-mode">
					<?php if (Configure::read('debug') == -1 && $this->name != "Installations"): ?>
						<span id="DebugMode" class="bca-debug-mode" title="インストールモードです。運営を開始する前にシステム設定よりノーマルモードに戻しましょう。">インストールモード</span>
					<?php elseif (Configure::read('debug') > 0): ?>
						<span id="DebugMode" class="bca-debug-mode" title="デバッグモードです。運営を開始する前にシステム設定よりノーマルモードに戻しましょう。">デバッグモード<?php echo mb_convert_kana(Configure::read('debug'), 'N') ?>
					<?php endif; ?>
				</div>
			<?php endif ?>
		</div>
		<div id="UserMenu" class="bca-toolbar__users">
			<ul class="clearfix">
				<li>
					<a href="javascript:void(0)" class="title"><?php echo __d('baser', 'よく使う項目') ?><img src="/theme/ownd_river/img/admin/btn_dropdown.png" width="8" height="11" class="bc-btn"></a>
					<div id="FavoriteArea" hidden>
						<?php $this->BcBaser->element('favorite_menu') ?>
						<?php $this->BcBaser->element('permission') ?>
					</div>
				</li>
				<li>
					<?php if (!empty($user)): ?>
						<?php $this->BcBaser->link($this->BcBaser->getUserName($user) . ' ' . $this->BcBaser->getImg('admin/btn_dropdown.png', array('width' => 8, 'height' => 11, 'class' => 'bc-btn')), 'javascript:void(0)', array('class' => 'title')) ?>
						<ul>
							<?php if ($this->Session->check('AuthAgent')): ?>
								<li><?php $this->BcBaser->link(__d('baser', '元のユーザーに戻る'), array('admin' => false, 'plugin' => null, 'controller' => 'users', 'action' => 'back_agent')) ?></li>
							<?php endif ?>
							<?php if (in_array('admin', $currentUserAuthPrefixes)): ?>
								<li><?php $this->BcBaser->link(__d('baser', 'アカウント設定'), array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'edit', $user['id'])) ?></li>
							<?php else: ?>
                                <?php if ($currentPrefix != 'front'): ?>
								<li><?php $this->BcBaser->link(__d('baser', 'アカウント設定'), array($currentPrefix => true, 'plugin' => null, 'controller' => 'users', 'action' => 'edit', $user['id'])) ?></li>
								<?php endif ?>
							<?php endif ?>
							<li><?php $this->BcBaser->link(__d('baser', 'ログアウト'), $logoutAction) ?></li>
						</ul>
					<?php elseif ($this->name != 'Installations' && $this->request->url != $loginUrl && !Configure::read('BcRequest.isUpdater')): ?>
						<?php $this->BcBaser->link(__d('baser', 'ログインしていません ') . $this->BcBaser->getImg('admin/btn_dropdown.png', array('width' => 8, 'height' => 11, 'class' => 'bc-btn')), 'javascript:void(0)', array('class' => 'title')) ?>
						<ul>
							<?php if ($currentPrefix == 'front'): ?>
								<li><?php $this->BcBaser->link(__d('baser', 'ログイン'), array('plugin' => null, 'controller' => 'users', 'action' => 'login')) ?></li>
							<?php else: ?>
								<li><?php $this->BcBaser->link(__d('baser', 'ログイン'), array($currentPrefix => true, 'plugin' => null, 'controller' => 'users', 'action' => 'login')) ?></li>
							<?php endif ?>
						</ul>
					<?php endif ?>
				</li>
				<?php if (!empty($user) && in_array('admin', $currentUserAuthPrefixes)): ?>
					<li>
						<?php $this->BcBaser->link(__d('baser', 'キャッシュクリア'), array('prefix' => 'admin', 'plugin'=> false, 'controller' => 'site_configs', 'action' => 'del_cache'), array('confirm' => __d('baser', 'キャッシュクリアします。いいですか？'))) ?>　
					</li>
				<?php endif ?>
			</ul>
		</div>
	</div>
</div>