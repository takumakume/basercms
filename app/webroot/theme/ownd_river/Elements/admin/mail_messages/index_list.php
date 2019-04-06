<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] 受信メール一覧　テーブル
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
    <!-- list-num -->
    <?php $this->BcBaser->element('list_num') ?>
    <!-- pagination -->
    <?php $this->BcBaser->element('pagination') ?>
  </div>
</div>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
<thead class="bca-table-listup__thead">
	<tr>
		<th class="list-tool bca-table-listup__thead-th bca-table-listup__thead-th--select"><?php // 一括選択 ?>
			<?php if ($this->BcBaser->isAdminUser()): ?>
				<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => __d('baser', '一括選択')]) ?>
			<?php endif; ?>
		</th>
		<th class="bca-table-listup__thead-th" style="white-space: nowrap"><?php // id ?>
			<?php
			echo $this->Paginator->sort('id', 
        array(
			        'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'No'),
              'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'No')
        ),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
				) 
			?>
		</th>
		<th class="bca-table-listup__thead-th"><?php // 受信日時 ?>
			<?php
			 echo $this->Paginator->sort('name', 
			 	array(
			 		'asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '受信日時'), 
			 		'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '受信日時')
			 	), 
			 	array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			 ); 
			?>
		</th>
		<th class="bca-table-listup__thead-th" style="white-space: nowrap">受信内容</th>
		<th class="bca-table-listup__thead-th" style="white-space: nowrap">添付</th>
		<th class="bca-table-listup__thead-th"><?php echo __d('baser', 'アクション') ?></th>
	</tr>
</thead>
<tbody class="bca-table-listup__tbody">
<?php if ($messages): ?>
		<?php $count = 0; ?>
		<?php foreach ($messages as $data): ?>
			<?php $this->BcBaser->element('mail_messages/index_row', array('data' => $data, 'count' => $count)) ?>
			<?php $count++; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan="6" class="row-tools bca-table-listup__tbody-td"><p class="no-data">データが見つかりませんでした。</p></td></tr>
<?php endif ?>
</tbody>
</table>