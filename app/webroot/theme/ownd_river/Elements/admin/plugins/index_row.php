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
 * [ADMIN] プラグイン一覧　行
 */
$classies = array('sortable');
if (!$data['Plugin']['status']) {
	$classies[] = 'disablerow';
}
$class = ' class="' . implode(' ', $classies) . '"';
?>


<tr<?php echo $class; ?>>
	<td class="row-tools bca-table-listup__tbody-td">
		<?php if ($this->BcBaser->isAdminUser()): ?>
			<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['Plugin']['id'], ['type' => 'checkbox', 'label'=> '<span class="bca-visually-hidden">チェックする</span>', 'class' => 'batch-targets bca-checkbox__input', 'value' => $data['Plugin']['id']]) ?>
		<?php endif ?>
		<?php if ($sortmode): ?>
			<span class="sort-handle"><i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>ドラッグ可能</span>
			<?php echo $this->BcForm->input('Sort.id' . $data['Plugin']['id'], array('type' => 'hidden', 'class' => 'id', 'value' => $data['Plugin']['id'])) ?>
		<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php if ($data['Plugin']['old_version']): ?>
			<div class="annotation-text"><small>新しいバージョンにアップデートしてください</small></div>
		<?php elseif ($data['Plugin']['update']): ?>
			<div class="annotation-text"><small>アップデートを完了させてください</small></div>
		<?php endif ?>
		<?php echo $data['Plugin']['name'] ?><?php if ($data['Plugin']['title']): ?>（<?php echo $data['Plugin']['title'] ?>）<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['Plugin']['version'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['Plugin']['description'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php $this->BcBaser->link($data['Plugin']['author'], $data['Plugin']['url'], array('target' => '_blank')) ?></td>
	<td class="bca-table-listup__tbody-td" style="width:10%;white-space: nowrap">
		<?php echo $this->BcTime->format('Y-m-d', $data['Plugin']['created']) ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['Plugin']['modified']) ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php if ($data['Plugin']['update']): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_update.png', array('alt' => __d('baser', 'アップデート'), 'class' => 'btn')), array('controller' => 'updaters', 'action' => 'plugin', $data['Plugin']['name']), array('title' => __d('baser', 'アップデート'), 'class' => 'btn-update')); ?>
		<?php endif ?>
		<?php if ($data['Plugin']['admin_link'] && $data['Plugin']['status'] && !$data['Plugin']['update'] && !$data['Plugin']['old_version']): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_manage.png', array('alt' => __d('baser', '管理'), 'class' => 'btn')), $data['Plugin']['admin_link'], array('title' => __d('baser', '管理'))) ?>
		<?php endif; ?>
		<?php if ($data['Plugin']['status']): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_disable.png', array('alt' => __d('baser', '無効'), 'class' => 'btn')), array('action' => 'ajax_delete', $data['Plugin']['name']), array('title' => __d('baser', '無効'), 'class' => 'btn-delete')) ?>
		<?php elseif (!$data['Plugin']['status'] && !$data['Plugin']['update'] && !$data['Plugin']['old_version']): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_install.png', array('alt' => __d('baser', 'インストール'), 'class' => 'btn')), array('action' => 'install', $data['Plugin']['name']), array('title' => __d('baser', 'インストール'))) ?>
		<?php endif ?>
		<?php if (!$data['Plugin']['status']): ?>
			<?php if (!in_array($data['Plugin']['name'], $corePlugins)): ?>
				<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('alt' => __d('baser', '削除'), 'class' => 'btn')), array('action' => 'ajax_delete_file', $data['Plugin']['name']), array('title' => __d('baser', '削除'), 'class' => 'btn-delfile')); ?>
			<?php endif ?>
		<?php endif; ?>
	</td>
</tr>