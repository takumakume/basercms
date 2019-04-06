<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Uploader.View
 * @since			baserCMS v 3.0.10
 * @license			http://basercms.net/license/index.html
 */
?>

<div class="bca-data-list__top">
<!-- 一括処理 -->
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div class="bca-action-table-listup">
			<?php echo $this->BcForm->input('ListTool.batch', ['type' => 'select', 'options' => array('del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'), 'data-bca-select-size' =>'lg']) ?>
			<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn', 'data-bca-btn-size' => 'lg')) ?>
		</div>
	<?php endif ?>
  <div class="bca-data-list__sub">
    <!-- pagination -->
    <?php $this->BcBaser->element('pagination') ?>
  </div>
</div>

<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th class="list-tool bca-table-listup__thead-th">
				<?php if($this->BcBaser->isAdminUser()): ?>
					<div>
						<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => '<span class="bca-visually-hidden">' . __d('baser', '一括選択'). '</span>']) ?>
					</div>
				<?php endif ?>
			</th>
			<th style="white-space: nowrap" class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('id', array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'No'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'No')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
			</th>
			<th style="white-space: nowrap" class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('name', array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'カテゴリ名'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'カテゴリ名')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
			</th>
			<th style="white-space: nowrap" class="bca-table-listup__thead-th">
				<?php echo $this->Paginator->sort('created', array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', '登録日'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', '登録日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
				<br />
				<?php echo $this->Paginator->sort('modified', array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', '更新日'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', '更新日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
			</th>
			<th class="bca-table-listup__thead-th">アクション</th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($datas)): ?>
			<?php foreach($datas as $data): ?>
				<?php $this->BcBaser->element('uploader_categories/index_row', array('data' => $data)) ?>
			<?php endforeach; ?>
		<?php else: ?>
		<tr>
			<td colspan="4"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
