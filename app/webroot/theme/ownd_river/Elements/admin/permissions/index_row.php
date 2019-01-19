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
 * [ADMIN] アクセス制限設定一覧　行
 */
?>


<?php if (!$data['Permission']['status']): ?>
	<?php $class = ' class="disablerow unpublish sortable"'; ?>
<?php else: ?>
	<?php $class = ' class="publish sortable"'; ?>
<?php endif; ?>
<tr<?php echo $class; ?>>
	<td class="row-tools bca-table-listup__tbody-td ">
		<?php if ($this->BcBaser->isAdminUser()): ?>
		<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['Permission']['id'], ['type' => 'checkbox', 'label'=> '<span class="bca-visually-hidden">チェックする</span>', 'class' => 'batch-targets bca-checkbox__input', 'value' => $data['Permission']['id']]) ?>
		<?php endif ?>
		<?php if ($sortmode): ?>
			<span class="sort-handle"><i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>ドラッグ可能</span>
			<?php echo $this->BcForm->input('Sort.id' . $data['Permission']['id'], array('type' => 'hidden', 'class' => 'id', 'value' => $data['Permission']['id'])) ?>
		<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['Permission']['no']; ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php $this->BcBaser->link($data['Permission']['name'], array('action' => 'edit', $this->request->params['pass'][0], $data['Permission']['id'])); ?><br />
		<?php echo $data['Permission']['url']; ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcText->arrayValue($data['Permission']['auth'], array(0 => '×', 1 => '〇')) ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $this->BcTime->format('Y-m-d', $data['Permission']['created']); ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['Permission']['modified']); ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php $this->BcBaser->link('', array('action' => 'ajax_unpublish', $data['Permission']['id']), array('title' => __d('baser', '非公開'), 'class' => 'btn-unpublish bca-btn-icon', 'data-bca-btn-type' => 'unpublish','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_publish.png', array('alt' => __d('baser', '有効'), 'class' => 'btn')), array('action' => 'ajax_publish', $data['Permission']['id']), array('title' => __d('baser', '公開'), 'class' => 'btn-publish')) ?>
		<?php $this->BcBaser->link('', array('action' => 'edit', $this->request->params['pass'][0], $data['Permission']['id']), array('title' => __d('baser', '編集'), 'class' => ' bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_copy', $this->request->params['pass'][0], $data['Permission']['id']), array('title' => __d('baser', 'コピー'), 'class' => 'btn-copy bca-icon--copy bca-btn-icon', 'data-bca-btn-type' => 'copy','data-bca-btn-size' => 'lg')) ?>
		<?php if ($data['Permission']['name'] != 'admins'): ?>
			<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['Permission']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete','data-bca-btn-size' => 'lg')) ?>
		<?php endif ?>
	</td>
</tr>