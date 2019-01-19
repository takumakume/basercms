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
 * [ADMIN] ウィジェットエリア一覧 行
 */
?>


<tr>
	<td class="row-tools bca-table-listup__tbody-td">
		<?php if ($this->BcBaser->isAdminUser()): ?>
		<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['WidgetArea']['id'], ['type' => 'checkbox', 'label'=> '<span class="bca-visually-hidden">チェックする</span>', 'class' => 'batch-targets bca-checkbox__input', 'value' => $data['WidgetArea']['id']]) ?>
		<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['WidgetArea']['id']; ?></td>
	<td class="bca-table-listup__tbody-td"><?php $this->BcBaser->link($data['WidgetArea']['name'], array('action' => 'edit', $data['WidgetArea']['id'])); ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['WidgetArea']['count']; ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcTime->format('Y-m-d', $data['WidgetArea']['created']); ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['WidgetArea']['modified']); ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php 
		$this->BcBaser->link('', 
			array('action' => 'edit', $data['WidgetArea']['id']), 
			array('title' => __d('baser', '編集'),'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')
		); 
		?>
		<?php 
		$this->BcBaser->link('', 
			array('action' => 'ajax_delete', $data['WidgetArea']['id']), 
			array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete','data-bca-btn-size' => 'lg')
		); 
		?>
	</td>
</tr>