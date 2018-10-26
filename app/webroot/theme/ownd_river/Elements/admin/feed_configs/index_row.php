<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Feed.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] フィード設定一覧　行
 */
?>


<tr>
	<td class="row-tools bca-table-listup__tbody-td">
		<?php if ($this->BcBaser->isAdminUser()): ?>
			<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['FeedConfig']['id'], ['type' => 'checkbox', 'class' => 'batch-targets', 'value' => $data['FeedConfig']['id']]) ?>
		<?php endif ?>
		<?php $this->BcBaser->link('', array('controller' => 'feed_configs', 'action' => 'preview', $data['FeedConfig']['id']), array('title' => __d('baser', '確認'), 'target' => '_blank', 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'preview','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'edit', $data['FeedConfig']['id']), array('title' => __d('baser', '編集'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['FeedConfig']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete','data-bca-btn-size' => 'lg')) ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['FeedConfig']['id']; ?></td>
	<td class="bca-table-listup__tbody-td"><?php $this->BcBaser->link($data['FeedConfig']['name'], array('action' => 'edit', $data['FeedConfig']['id'])) ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['FeedConfig']['display_number'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcTime->format('Y-m-d', $data['FeedConfig']['created']); ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['FeedConfig']['modified']); ?></td>
</tr>
