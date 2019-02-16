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
 * [ADMIN] よく使う項目
 */
?>


<div id="FavoriteDeleteUrl" style="display: none"><?php $this->BcBaser->url(array('plugin' => null, 'controller' => 'favorites', 'action' => 'ajax_delete')) ?></div>
<div id="FavoriteAjaxSorttableUrl" style="display:none"><?php $this->BcBaser->url(array('plugin' => null, 'controller' => 'favorites', 'action' => 'update_sort')) ?></div>

<nav id="FavoriteMenu" class="bca-nav-favorite">

	<h2 class="bca-nav-favorite-title"><span class="bca-nav-favorite-title-label"><?php echo __d('baser', 'お気に入り') ?></span></h2>

	<ul class="favorite-menu-list bca-nav-favorite-list">
		<?php if (!empty($favorites)): ?>
			<?php foreach ($favorites as $favorite): ?>
				<?php $this->BcBaser->element('favorite_menu_row', array('favorite' => $favorite)) ?>
			<?php endforeach ?>

		<?php else: ?>
			<li class="no-data"><?php echo __d('baser', '「お気に入りに追加」ボタンよりお気に入りを登録しておく事ができます。') ?></li>
		<?php endif ?>
	</ul>

</nav>

<div id="FavoriteDialog" title="お気に入り登録" style="display:none">
	<?php echo $this->BcForm->create('Favorite', array('url' => array('plugin' => null, 'action' => 'ajax'))) ?>
	<?php echo $this->BcForm->input('Favorite.id', array('type' => 'hidden')) ?>
	<dl>
		<dt><?php echo $this->BcForm->label('Favorite.name', __d('baser', 'タイトル')) ?></dt><dd><?php echo $this->BcForm->input('Favorite.name', array('type' => 'text', 'size' => 30, 'class' => 'required')) ?></dd>
		<dt><?php echo $this->BcForm->label('Favorite.url', __d('baser', 'URL')) ?></dt><dd><?php echo $this->BcForm->input('Favorite.url', array('type' => 'text', 'size' => 30, 'class' => 'required')) ?></dd>
	</dl>
	<?php echo $this->BcForm->end() ?>
</div>


<ul id="FavoritesMenu" class="context-menu" style="display:none">
    <li class="edit"><?php $this->BcBaser->link(__d('baser', '編集'), '#FavoriteEdit') ?></li>
    <li class="delete"><?php $this->BcBaser->link(__d('baser', '削除'), '#FavoriteDelete') ?></li>
</ul>
