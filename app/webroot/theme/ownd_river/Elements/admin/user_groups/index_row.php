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
 * [ADMIN] ユーザーグループ一覧　行
 */
?>


<tr>
	<td class="bca-form-table__input"><?php echo $data['UserGroup']['id'] ?></td>
	<td class="bca-form-table__input"><?php $this->BcBaser->link($data['UserGroup']['name'], array('action' => 'edit', $data['UserGroup']['id'])) ?>
		<?php if ($data['User']): ?><br />
			<?php foreach ($data['User'] as $user): ?>
				<span class="tag"><?php $this->BcBaser->link($this->BcBaser->getUserName($user), array('controller' => 'users', 'action' => 'edit', $user['id'])) ?></span>
			<?php endforeach ?>
		<?php endif ?>
	</td>
	<td class="bca-form-table__input"><?php echo $data['UserGroup']['title'] ?></td>
	<td class="bca-form-table__input"><?php echo $this->BcTime->format('Y-m-d', $data['UserGroup']['created']) ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['UserGroup']['modified']) ?></td>
	<td class="bca-form-table__input">
		<?php if ($data['UserGroup']['name'] != 'admins'): ?>
			<?php $this->BcBaser->link('', array('controller' => 'permissions', 'action' => 'index', $data['UserGroup']['id']), array('title' => __d('baser', '制限'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'permission', 'data-bca-btn-size' => 'lg')) ?>
		<?php endif ?>
		<?php $this->BcBaser->link('', array('action' => 'edit', $data['UserGroup']['id']), array('title' => __d('baser', '編集'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit', 'data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_copy', $data['UserGroup']['id']), array('title' => __d('baser', 'コピー'), 'class' => 'btn-copy bca-btn-icon', 'data-bca-btn-type' => 'copy', 'data-bca-btn-size' => 'lg')) ?>
		<?php if ($data['UserGroup']['name'] != 'admins'): ?>
			<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['UserGroup']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'lg')) ?>
		<?php endif ?>
	</td>
</tr>