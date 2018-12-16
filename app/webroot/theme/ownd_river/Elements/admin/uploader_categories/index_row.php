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


<tr>
	<td class="row-tools bca-table-listup__tbody-td">
<?php if($this->BcBaser->isAdminUser()): ?>
	<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['UploaderCategory']['id'], ['type' => 'checkbox', 'label'=> '<span class="bca-visually-hidden">チェックする</span>', 'class' => 'batch-targets bca-checkbox__input', 'value' => $data['UploaderCategory']['id']]) ?>
<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['UploaderCategory']['id'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['UploaderCategory']['name'] ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $data['UploaderCategory']['created'] ?><br />
		<?php echo $data['UploaderCategory']['modified'] ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php $this->BcBaser->link('', array('action' => 'edit', $data['UploaderCategory']['id']), array('title' => __d('baser', '編集'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_copy', $data['UploaderCategory']['id']), array('title' => __d('baser', 'コピー'), 'class' => 'btn-copy bca-btn-icon', 'data-bca-btn-type' => 'copy','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['UploaderCategory']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete','data-bca-btn-size' => 'lg')) ?>
	</td>
</tr>
