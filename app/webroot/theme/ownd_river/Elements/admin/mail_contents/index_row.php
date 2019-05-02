<?php
/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) baserCMS Users Community <https://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			https://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			https://basercms.net/license/index.html
 */

/**
 * [ADMIN] メールコンテンツ一覧　行
 */
if (!$data['MailContent']['status']) {
	$class = ' class="unpublish disablerow"';
} else {
	$class = ' class="publish"';
}
?>


<tr <?php echo $class; ?>>
	<td class="row-tools">
		<?php //echo $this->BcForm->input('ListTool.batch_targets.'.$data['MailContent']['id'], ['type' => 'checkbox', 'class' => 'batch-targets', 'value' => $data['MailContent']['id']]) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_check.png', array('alt' => __d('baser', '確認'), 'class' => 'btn')), '/' . $data['Content']['name'] . '/index', array('title' => __d('baser', '確認'), 'target' => '_blank')) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_manage.png', array('alt' => __d('baser', '管理'), 'class' => 'btn')), array('controller' => 'mail_fields', 'action' => 'index', $data['MailContent']['id']), array('title' => __d('baser', '管理'))) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('alt' => __d('baser', '編集'), 'class' => 'btn')), array('action' => 'edit', $data['MailContent']['id']), array('title' => __d('baser', '編集'))) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_copy.png', array('alt' => __d('baser', 'コピー'), 'class' => 'btn')), array('action' => 'ajax_copy', $data['MailContent']['id']), array('title' => __d('baser', 'コピー'), 'class' => 'btn-copy')) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('alt' => __d('baser', '削除'), 'class' => 'btn')), array('action' => 'ajax_delete', $data['MailContent']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete')) ?>
	</td>
	<td><?php echo $data['MailContent']['id'] ?></td>
	<td><?php $this->BcBaser->link($data['']['name'], array('action' => 'edit', $data['MailContent']['id'])) ?></td>
	<td><?php echo $data['MailContent']['title'] ?></td>
	<td><?php echo $this->BcTime->format('Y-m-d', $data['MailContent']['created']) ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['MailContent']['modified']) ?></td>
</tr>