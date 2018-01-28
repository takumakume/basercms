<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] ブログ記事 一覧　検索ボックス
 */
$this->BlogCategories = $this->BcForm->getControlSource('BlogPost.blog_category_id', array('blogContentId' => $blogContent['BlogContent']['id']));
$this->BlogTags = $this->BcForm->getControlSource('BlogPost.blog_tag_id');
$users = $this->BcForm->getControlSource("BlogPost.user_id");
?>

<?php echo $this->BcForm->create('BlogPost', array('url' => array('action' => 'index', $blogContent['BlogContent']['id']))) ?>
<p class="bca-search__input-list">
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('BlogPost.name', __d('baser', 'タイトル')) ?> <?php echo $this->BcForm->input('BlogPost.name', array('type' => 'text', 'class' => 'bca-input-text', 'size' => '30')) ?></span>
	<?php if ($this->BlogCategories): ?>
		<span class="bca-search__input-item"><?php echo $this->BcForm->label('BlogPost.blog_category_id', __d('baser', 'カテゴリー')) ?> <?php echo $this->BcForm->input('BlogPost.blog_category_id', array('type' => 'select', 'class' => 'bca-select', 'options' => $this->BlogCategories, 'escape' => false, 'empty' => __d('baser', '指定なし'))) ?></span>
	<?php endif ?>
	<?php if ($blogContent['BlogContent']['tag_use'] && $this->BlogTags): ?>
		<span class="bca-search__input-item"><?php echo $this->BcForm->label('BlogPost.blog_tag_id', __d('baser', 'タグ')) ?> <?php echo $this->BcForm->input('BlogPost.blog_tag_id', array('type' => 'select', 'class' => 'bca-select', 'options' => $this->BlogTags, 'escape' => false, 'empty' => __d('baser', '指定なし'))) ?></span>
	<?php endif ?>
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('BlogPost.status', __d('baser', '公開状態')) ?> <?php echo $this->BcForm->input('BlogPost.status', array('type' => 'select', 'class' => 'bca-select', 'options' => $this->BcText->booleanMarkList(), 'empty' => __d('baser', '指定なし'))) ?></span>
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('BlogPost.user_id', __d('baser', '作成者')) ?> <?php echo $this->BcForm->input('BlogPost.user_id', array('type' => 'select', 'class' => 'bca-select', 'options' => $users, 'empty' => __d('baser', '指定なし'))) ?></span>
</p>
<div class="button bca-search__btns">
	<div class="bca-search__btns-item"><?php $this->BcBaser->link(__d('baser', '検索'), "javascript:void(0)", array('id' => 'BtnSearchSubmit', 'class' => 'bca-btn', 'data-bca-btn-type' => 'search')) ?></div>
	<div class="bca-search__btns-item"><?php $this->BcBaser->link(__d('baser', 'クリア'), "javascript:void(0)", array('id' => 'BtnSearchClear', 'class' => 'bca-btn', 'data-bca-btn-type' => 'clear')) ?></div>
</div>