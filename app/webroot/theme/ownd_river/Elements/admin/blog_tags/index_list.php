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
 * [ADMIN] ブログタグ一覧　テーブル
 */
?>

<div class="bca-data-list__top">
<!-- 一括処理 -->
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div class="bca-action-table-listup">
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
			<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn', 'data-bca-btn-size' => 'lg')) ?>
		</div>
	<?php endif ?>

	<div class="bca-data-list__top">
		<!-- pagination -->
		 <div class="bca-data-list__sub">
			<?php $this->BcBaser->element('pagination') ?>
		</div>
	</div>
</div>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th class="bca-table-listup__thead-th">
			<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'title' => __d('baser', '一括選択')]) ?>
			<label for="ListToolCheckall" data-bca-checkbox-size="sm" class="bca-checkbox-label"></label>
			</th>
			<th style="width:160px" class="list-tool bca-table-listup__thead-th">
				<?php echo __d('baser', 'アクション') ?>
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
				echo $this->Paginator->sort('name', 
					array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'ブログタグ名'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'ブログタグ名')),
					array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
				); 
				?>
			</th>
			<th class="bca-table-listup__thead-th">
				<?php 
				echo $this->Paginator->sort('created', 
					array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '登録日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '登録日')),
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
		</tr>
</thead>
<tbody class="bca-table-listup__tbody">
	<?php if (!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('blog_tags/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="4"><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。') ?></p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>

<div class="bca-data-list__bottom">
  <div class="bca-data-list__sub">
	<!-- list-num -->
	<?php $this->BcBaser->element('list_num') ?>
  </div>
</div>
