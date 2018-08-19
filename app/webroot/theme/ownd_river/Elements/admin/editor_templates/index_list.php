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
 * [ADMIN] エディタテンプレート一覧　テーブル
 */
?>

<div class="bca-data-list__top">
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div class="bca-action-table-listup">
			<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => __d('baser', '一括選択'),'class'=>'bca-checkbox')) ?>
			<label for="ListToolCheckall" data-bca-checkbox-size="sm" class="bca-checkbox-label"></label>
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
			<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class'=>'bca-btn')) ?>
		</div>
	<?php endif ?>
	<div class="bca-data-list__sub">
		<!-- pagination -->
		<?php $this->BcBaser->element('pagination') ?>
	</div>
</div>


<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th style="width:140px" class="list-tool bca-table-listup__thead-th">
				<div>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn', 'hidden' => 'hidden')) . __d('baser', '新規追加'), array('action' => 'add'), array( 'class'=> 'bca-btn', 'data-bca-btn-type' => 'add', 'data-bca-btn-size' => 'lg')) ?>
				</div>
			</th>
			<th class="bca-table-listup__thead-th">NO</th>
			<th class="bca-table-listup__thead-th"><?php echo __d('baser', 'テンプレート名')?></th>
			<th class="bca-table-listup__thead-th"><?php echo __d('baser', '説明文')?></th>
			<th class="bca-table-listup__thead-th"><?php echo __d('baser', '登録日')?><br /><?php echo __d('baser', '更新日')?></th>
		</tr>
	</thead>
<tbody>
	<?php if (!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('editor_templates/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="5" class="bca-table-listup__tbody-td"><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。')?></p></td>
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
