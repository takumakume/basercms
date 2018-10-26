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
	<?php /*$this->BcBaser->link(
		__d('baser', '新規記事追加'), array('action' => 'add', $blogContent['BlogContent']['id']), array('class'=>'bca-btn--small  bca-btn--add'))*/ ?>
</div>
-->

<div class="bca-data-list__top">
<!-- 一括処理 -->
<?php if ($this->BcBaser->isAdminUser()): ?>
	<div class="bca-action-table-listup">
		<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('publish' => __d('baser', '公開'), 'unpublish' => __d('baser', '非公開'), 'del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'), 'data-bca-select-size' =>'lg')) ?>
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
		<th class="list-tool bca-table-listup__thead-th  bca-table-listup__thead-th--select"><?php // 一括選択 ?>
			<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'title' => __d('baser', '一括選択')]) ?>
			<label for="ListToolCheckall" data-bca-checkbox-size="sm" class="bca-checkbox-label"></label>
		</th>
		<th class="bca-table-listup__thead-th"><?php // No ?>
			<?php echo $this->Paginator->sort('no',
        array(
			        'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'NO'),
              'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'NO')
        ),
        array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
    </th>
		<th class="bca-table-listup__thead-th"><?php // タイトル＋アイキャッチ ?>
			<?php echo $this->Paginator->sort('name', array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'タイトル'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'タイトル')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th"><?php // カテゴリ ?>
			<?php echo $this->Paginator->sort('BlogCategory.name', array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'カテゴリ'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'カテゴリ')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
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
			<?php echo $this->Paginator->sort('user_id', array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '作成者'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '作成者')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th"><?php // 投稿日 ?>
			<?php echo $this->Paginator->sort('posts_date', array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '投稿日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '投稿日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<?php /*
		<th class="bca-table-listup__thead-th"><?php // 登録日・更新日 ?>
			<?php echo $this->Paginator->sort('created', array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', '登録日'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', '登録日')), array('escape' => false, 'class' => 'btn-direction')) ?><br />
			<?php echo $this->Paginator->sort('modified', array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', '更新日'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', '更新日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
 */ ?>
		<th class="bca-table-listup__thead-th"><?php // アクション ?>
			<?php echo __d('baser', 'アクション') ?>
		</th>
		<?php /*
		<th class="bca-table-listup__thead-th"><?php // 公開状態 ?>
			<?php echo $this->Paginator->sort('status', array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', '公開状態'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', '公開状態')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
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
