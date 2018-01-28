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
 * [ADMIN] ブログ記事コメント 一覧　テーブル
 */
?>
<!-- 一括処理 -->
<div class="bca-data-list__top">
<?php if ($this->BcBaser->isAdminUser()): ?>
	<div class="bca-action-table-listup">
		<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('publish' => '公開', 'unpublish' => __d('baser', '非公開'), 'del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
		<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled' , 'class' => 'bca-btn', 'data-bca-btn-size' => 'sm')) ?>
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
<thead class="bca-table-listup__thead ">
	<tr>
		<th class="list-tool bca-table-listup__thead-th">
			<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => __d('baser', '一括選択'))) ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('no', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'NO'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'NO')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('name', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '投稿者'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '投稿者')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('email', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'メール'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'メール')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
			<br />
			<?php 
			echo $this->Paginator->sort('url',
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'URL'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'URL')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			 ); 
			 ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('message', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'メッセージ'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'メッセージ')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('created', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '投稿日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '投稿日')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
			<br />
			<?php 
			echo $this->Paginator->sort('modified', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '更新日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '更新日')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th"><?php // アクション ?>
			<?php echo __d('baser', 'アクション') ?>
		</th>
	</tr>
</thead>
<tbody class="bca-table-listup__tbody">
	<?php if (!empty($dbDatas)): ?>
		<?php foreach ($dbDatas as $data): ?>
			<?php $this->BcBaser->element('blog_comments/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan="6" class="bca-table-listup__tbody-td"><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。') ?></p></td></tr>
	<?php endif; ?>
</tbody>
</table>

<div class="bca-data-list__bottom">
  <div class="bca-data-list__sub">
    <!-- pagination -->
	<?php $this->BcBaser->element('pagination') ?>
  </div>
</div>

