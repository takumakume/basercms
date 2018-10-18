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
 * [ADMIN] ブログカテゴリ 一覧　行
 */
$allowOwners = array();
if (isset($user['user_group_id'])) {
	$allowOwners = array('', $user['user_group_id']);
}
?>


<tr<?php echo $rowGroupClass ?>>
	<td class="row-tools bca-table-listup__tbody-td">
		<?php if ($this->BcBaser->isAdminUser()): ?>
			<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['BlogCategory']['id'], ['type' => 'checkbox', 'class' => 'batch-targets', 'value' => $data['BlogCategory']['id']]) ?>
		<?php endif ?>		
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['BlogCategory']['no'] ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php if (in_array($data['BlogCategory']['owner_id'], $allowOwners) || $this->BcAdmin->isSystemAdmin()): ?>
			<?php $this->BcBaser->link($data['BlogCategory']['name'], array('action' => 'edit', $blogContent['BlogContent']['id'], $data['BlogCategory']['id'])) ?>
		<?php else: ?>
			<?php echo $data['BlogCategory']['name'] ?>
		<?php endif ?>
		<?php if ($this->BcBaser->siteConfig['category_permission']): ?>
			<br />
			<?php echo $this->BcText->arrayValue($data['BlogCategory']['owner_id'], $owners) ?>
		<?php endif ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['BlogCategory']['title'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcTime->format('Y-m-d', $data['BlogCategory']['created']); ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['BlogCategory']['modified']); ?></td>
  <td class="bca-table-listup__tbody-td">
    <?php $this->BcBaser->link('', $this->Blog->getCategoryUrl($data['BlogCategory']['id']), array('title' => __d('baser', '確認'), 'target' => '_blank', 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'preview','data-bca-btn-size' => 'lg')) ?>
    <?php if (in_array($data['BlogCategory']['owner_id'], $allowOwners) || (isset($user['user_group_id']) && $user['user_group_id'] == Configure::read('BcApp.adminGroupId'))): ?>
      <?php $this->BcBaser->link('', array('action' => 'edit', $blogContent['BlogContent']['id'], $data['BlogCategory']['id']), array('title' => __d('baser', '編集'),'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
      <?php $this->BcBaser->link('', array('action' => 'ajax_delete', $blogContent['BlogContent']['id'], $data['BlogCategory']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete','data-bca-btn-size' => 'lg')) ?>
    <?php endif ?>
  </td>
</tr>
