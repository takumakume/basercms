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
 * [ADMIN] ブログタグ一覧　行
 */
?>


<tr>
	<td class="row-tools bca-table-listup__tbody-td">
		<?php if ($this->BcBaser->isAdminUser()): ?>
			<?php echo $this->BcForm->checkbox('ListTool.batch_targets.' . $data['BlogTag']['id'], array('type' => 'checkbox', 'class' => 'batch-targets', 'value' => $data['BlogTag']['id'])) ?>
		<?php endif ?>	
		<?php $this->BcBaser->link('', array('action' => 'edit', $data['BlogTag']['id']), array('title' => __d('baser', '編集'),'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['BlogTag']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete','data-bca-btn-size' => 'lg')) ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['BlogTag']['id'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php $this->BcBaser->link($data['BlogTag']['name'], array('action' => 'edit', $data['BlogTag']['id'])) ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcTime->format('Y-m-d', $data['BlogTag']['created']); ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['BlogTag']['modified']); ?></td>
</tr>
