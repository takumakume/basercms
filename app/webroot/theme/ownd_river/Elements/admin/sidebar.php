<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 3.0.3
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] サイドバー
 */
?>

<div id="SideBar" class="bca-nav">
	<div id="FavoriteArea">
		<?php $this->BcBaser->element('favorite_menu') ?>
		<?php $this->BcBaser->element('permission') ?>
	</div>

	<nav class="bca-nav__main" data-js-tmpl="AdminMenu" hidden>
		<h2 class="bca-nav__main-title"><?php echo __d('baser', '管理メニュー') ?></h2>
		<div class="bca-nav__sub" data-content-type="dashboard">
			<h3 class="bca-nav__sub-title">
				<a v-bind:href="baseURL + '/admin'" class="bca-nav__sub-title-label"><?php echo __d('baser', 'ダッシュボード') ?></a>
			</h3>
		</div>
		<div v-for="content in contentList" class="bca-nav__sub" v-bind:data-content-type="content.type" v-bind:data-content-is-current="content.current">
			<h3 class="bca-nav__sub-title">
				<a v-bind:href="baseURL + content.url" class="bca-nav__sub-title-label">{{ content.title }}</a>
			</h3>
			<ul class="bca-nav__sub-list">
				<li v-for="subContent in content.menus" class="bca-nav__sub-list-item" v-bind:data-sub-content-is-current="subContent.current">
					<a v-bind:href="baseURL + subContent.url">
						<span class="bca-nav__sub-list-item-title">{{ subContent.title }}</span>
					</a>
				</li>
			</ul>
		</div>
	</nav>

	<nav class="bca-nav__main" data-js-container="AdminMenu" hidden></nav>

<?php if(!empty($this->BcBaser->siteConfig['admin_side_banner'])): ?>
	<div class="bca-banner-area">
		<ul>
			<li class="bca-banner-area-list"><a href="https://market.basercms.net/" target="_blank"><img src="http://basercms.net/img/banner_baser_market.png" width="205" alt="baserマーケット" title="baserマーケット" /></a></li>
			<li class="bca-banner-area-list"><a href="http://magazine.basercms.net/" target="_blank"><img src="http://basercms.net/img/banner_basers_magazine.png" width="205" alt="basersマガジン" title="baserマーケット" /></a></li>
		</ul>
	</div>
<?php endif ?>
<!-- / #SideBar --></div>

<script id="AdminMenu" type="application/json">
<?php echo $this->BcAdmin->getJsonMenu() ?>
</script>