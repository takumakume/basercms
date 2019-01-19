<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * コンテンツ一覧 テーブル
 */
?>

<div class="bca-data-list__top">
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div class="bca-action-table-listup">
			<?php /*echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'title' => __d('baser', '一括選択')])*/ ?>
			<?php echo $this->BcForm->input('ListTool.batch', ['type' => 'select', 'options' => ['del' => __d('baser', '削除'), 'publish' => __d('baser', '公開'), 'unpublish' => __d('baser', '非公開')], 'empty' => __d('baser', '一括処理')]) ?>
			<?php echo $this->BcForm->button(__d('baser', '適用'), ['id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn']) ?>
		</div>
	<?php endif ?>
	<div class="bca-data-list__sub">
		<?php $this->BcBaser->element('pagination') ?>
	</div>
</div>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup sort-table" id="ListTable">
	<thead class="bca-table-listup__thead">
	<tr>
		<th class="list-tool bca-table-listup__thead-th  bca-table-listup__thead-th--select"><?php // 一括選択 ?>
			<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => '<span class="bca-visually-hidden">' . __d('baser', '一括選択'). '</span>']) ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('id', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'NO'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'NO')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('type', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'タイプ'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'タイプ')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('url', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'URL'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'URL')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
			<br>
			<?php 
			echo $this->Paginator->sort('title', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'タイトル'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'タイトル')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('status', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '公開状態'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '公開状態')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('author_id', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '作成者'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '作成者')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php 
			echo $this->Paginator->sort('created_date', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '作成日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '作成日')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
			<br />
			<?php 
			echo $this->Paginator->sort('modified_date', 
				array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '更新日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '更新日')),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			); 
			?>
		</th>
		<th class="list-tool bca-table-listup__thead-th">
			<?php echo __d('baser', 'アクション') ?>
		</th>
	</tr>
	</thead>
	<tbody>
	<?php if (!empty($datas)): ?>
		<?php $count = 0; ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('contents/index_row_table', array('data' => $data, 'count' => $count)) ?>
			<?php $count++; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="7"><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。')?></p></td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>

<div class="bca-data-list__bottom">
	<div class="bca-data-list__sub">
		<?php $this->BcBaser->element('list_num') ?>
	</div>
</div>
