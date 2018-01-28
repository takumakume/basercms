<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 2.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] レイアウト
 */
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex,nofollow" />
		<?php $this->BcBaser->title() ?>
		<?php
		$this->BcBaser->css(array(
			'admin/style.css',
			'admin/jquery-ui/jquery-ui.min',
			'../js/admin/vendors/jquery.jstree-3.3.1/themes/proton/style.min',
			'../js/admin/vendors/jquery-contextMenu-2.2.0/jquery.contextMenu.min',
			'admin/colorbox/colorbox-1.6.1'))
		?>

		<?php # if($favoriteBoxOpened): ?>
			<?php # $this->BcBaser->css('admin/sidebar_opened') ?>
		<?php # endif ?>

		<!--[if IE]><?php $this->BcBaser->js(array('admin/vendors/excanvas')) ?><![endif]-->
		<?php
		$this->BcBaser->js(array(
			'admin/vue.min',
			'admin/vendors/jquery-2.1.4.min',
			'admin/vendors/jquery-ui-1.11.4.min',
			'admin/vendors/i18n/ui.datepicker-ja',
			'admin/vendors/jquery.bt.min',
			'admin/vendors/jquery-contextMenu-2.2.0/jquery.contextMenu.min',
			'admin/vendors/jquery.form-2.94',
			'admin/vendors/jquery.validate.min',
			'admin/vendors/jquery.colorbox-1.6.1.min',
			'admin/libs/jquery.mScroll',
			'admin/libs/jquery.baseUrl',
			'admin/libs/jquery.bcConfirm',
			'admin/libs/credit',
			'admin/vendors/validate_messages_ja',
			'admin/functions',
			'admin/libs/adjust_scroll',
			'admin/libs/jquery.bcUtil',
			'admin/libs/jquery.bcToken',
			'admin/sidebar',
			'admin/startup',
			'admin/favorite',
			'admin/permission'))
		?>
<?php $this->BcBaser->scripts() ?>
	</head>

	<body id="<?php $this->BcBaser->contentsName() ?>" class="normal">
		<div id="Page">
			<div id="BaseUrl" style="display: none"><?php echo $this->request->base ?></div>
			<div id="SaveFavoriteBoxUrl" style="display:none"><?php $this->BcBaser->url(array('plugin' => '', 'controller' => 'dashboard', 'action' => 'ajax_save_favorite_box')) ?></div>
			<div id="SaveSearchBoxUrl" style="display:none"><?php $this->BcBaser->url(array('plugin' => '', 'controller' => 'dashboard', 'action' => 'ajax_save_search_box', $this->BcBaser->getContentsName(true))) ?></div>
			<div id="SearchBoxOpened" style="display:none"><?php echo $this->Session->read('Baser.searchBoxOpened.' . $this->BcBaser->getContentsName(true)) ?></div>
			<div id="CurrentPageName" style="display: none"><?php $this->BcBaser->contentsTitle() ?></div>
			<div id="CurrentPageUrl" style="display: none"><?php echo ($this->request->url == Configure::read('Routing.prefixes.0')) ? '/admin/dashboard/index' : '/' . $this->request->url; ?></div>

			<!-- Waiting -->
			<div id="Waiting" class="waiting-box" style="display:none">
				<div class="corner10">
			<?php echo $this->Html->image('admin/ajax-loader.gif') ?><br />
					W A I T
				</div>
			</div>

			<?php $this->BcBaser->header() ?>

			<div id="Wrap" class="bca-container">

<?php if ($this->name != 'Installations' && $this->name != 'Updaters' && ('/' . $this->request->url != Configure::read('BcAuthPrefix.admin.loginAction')) && !empty($user)): ?>
			<?php $this->BcBaser->element('sidebar') ?>
<?php endif ?>


				<main id="Contents" class="bca-main">

					<article id="ContentsBody" class="contents-body bca-main__body">

						<div class="bca-main__header">
							<h1 class="bca-main__header-title"><?php $this->BcBaser->contentsTitle() ?></h1>
							<div class="bca-main__header-actions">
								<?php $this->BcBaser->element('main_body_header_links'); ?>
							</div>
							<div class="bca-main__header-menu">
								<?php $this->BcBaser->element('contents_menu') ?>
							</div>
							</div>

							<?php if ($this->request->params['controller'] != 'installations' && !empty($this->BcBaser->siteConfig['first_access'])): ?>
								<div id="FirstMessage" class="em-box" style="text-align:left">
									<?php echo __d('baser', 'baserCMSへようこそ。') ?><br>
									<ul style="font-weight:normal;font-size:14px;">
										<li><?php echo __d('baser', '画面右上の「システムナビ」より管理システムの全ての機能にアクセスする事ができます。') ?></li>
										<li><?php echo __d('baser', 'よく使う機能については、画面右側にある「よく使う項目」をクリックして、お気に入りとして登録する事ができます。') ?></li>
										<li><?php echo __d('baser', 'まずは、画面上部のメニュー、「コンテンツ管理」よりWebサイトの全体像を確認しましょう。') ?></li>
									</ul>
								</div>
							<?php endif ?>

							<?php $this->BcBaser->flash() ?>

							<div id="BcMessageBox"><div id="BcSystemMessage" class="notice-message">&nbsp;</div></div>

							<?php if(@$help): ?>
							<?php $this->BcBaser->element('help', [], ['cache' => ['key' => '_admin_help_' . $help]]) ?>
							<?php endif ?>

							<?php $this->BcBaser->element('search') ?>

							<?php $this->BcBaser->content() ?>

					<!-- / bca-main__body --></article>

						<?php if (!empty($user)): ?>
					<div id="ToTop" class="bca-totop"><?php $this->BcBaser->link(__d('baser', '▲ トップへ'), '#Header') ?></div>
						<?php endif ?>

				<!-- / .bca-main --></main>

			<!-- / #Wrap --></div>

<?php $this->BcBaser->footer() ?>

			<!-- / #Page --></div>

<?php $this->BcBaser->func() ?>
	</body>

</html>
