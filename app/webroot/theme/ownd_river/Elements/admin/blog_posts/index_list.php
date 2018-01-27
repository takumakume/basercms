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
 * [ADMIN] ブログ記事 一覧　テーブル
 */

/*
記事表示列の順番
・一括選択
・No
・タイトル＋アイキャッチ
・カテゴリ
・タグ
・コメント
・作者
・投稿日
・アクション
 */
?>

<!-- 新規追加 -->
<!--
<div class="">
	<?php $this->BcBaser->link(
		__d('baser', '新規記事追加'), array('action' => 'add', $blogContent['BlogContent']['id']), array('class'=>'bca-btn--small  bca-btn--add')) ?>
</div>
-->

<div class="bca-data-list__top">
<!-- 一括処理 -->
<?php if ($this->BcBaser->isAdminUser()): ?>
	<div class="bca-action-table-listup">
		<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('publish' => __d('baser', '公開'), 'unpublish' => __d('baser', '非公開'), 'del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
		<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled' , 'class' => 'bca-btn', 'data-bca-btn-size' => 'lg')) ?>
	</div>
<?php endif ?>
  <div class="bca-data-list__sub">
    <!-- list-num -->
    <?php $this->BcBaser->element('list_num') ?>
    <!-- pagination -->
    <?php $this->BcBaser->element('pagination') ?>
  </div>
</div>

<!-- list -->
<table class="list-table bca-table-listup" id="ListTable">
<thead class="bca-table-listup__thead">
	<tr>
		<th class="list-tool bca-table-listup__thead-th"><?php // 一括選択 ?>
			<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => __d('baser', '一括選択'))) ?>
		</th>
		<th class="bca-table-listup__thead-th"><?php // No ?>
			<?php echo $this->Paginator->sort('no', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', 'NO'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', 'NO')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th"><?php // タイトル＋アイキャッチ ?>
			<?php //echo $this->Paginator->sort('eye_catch', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', 'アイキャッチ'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', 'アイキャッチ')), array('escape' => false, 'class' => 'btn-direction')) ?>
			<?php echo $this->Paginator->sort('name', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', 'タイトル'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', 'タイトル')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th"><?php // カテゴリ ?>
			<?php echo $this->Paginator->sort('BlogCategory.name', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', 'カテゴリ'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', 'カテゴリ')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<?php if ($blogContent['BlogContent']['tag_use']): ?>
		<th class="bca-table-listup__thead-th"><?php // タグ ?>
			<?php echo __d('baser', 'タグ') ?>
		</th>
		<?php endif ?>
		<?php if ($blogContent['BlogContent']['comment_use']): ?>
			<th class="bca-table-listup__thead-th"><?php echo __d('baser', 'コメント') ?></th>
		<?php endif ?>
		</th>
		<th class="bca-table-listup__thead-th"><?php // 作成者 ?>
			<?php echo $this->Paginator->sort('user_id', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', '作成者'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', '作成者')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th"><?php // 投稿日 ?>
			<?php echo $this->Paginator->sort('posts_date', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', '投稿日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', '投稿日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<?php /*
		<th class="bca-table-listup__thead-th"><?php // 登録日・更新日 ?>
			<?php echo $this->Paginator->sort('created', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', '登録日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', '登録日')), array('escape' => false, 'class' => 'btn-direction')) ?><br />
			<?php echo $this->Paginator->sort('modified', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', '更新日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', '更新日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
 */ ?>
		<th class="bca-table-listup__thead-th"><?php // アクション ?>
			<?php echo __d('baser', 'アクション') ?>
		</th>
		<?php /*
		<th class="bca-table-listup__thead-th"><?php // 公開状態 ?>
			<?php echo $this->Paginator->sort('status', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', '公開状態'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', '公開状態')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
 */ ?>
	</tr>
</thead>
<tbody class="bca-table-listup__tbody">
<?php if (!empty($posts)): ?>
	<?php foreach ($posts as $data): ?>
		<?php $this->BcBaser->element('blog_posts/index_row', array('data' => $data)) ?>
	<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>

<?php if (empty($posts)): ?>
<p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。') ?></p>
<?php endif; ?>


<div class="bca-data-list__bottom">
  <div class="bca-data-list__sub">
    <!-- pagination -->
    <?php $this->BcBaser->element('pagination') ?>
  </div>
</div>
