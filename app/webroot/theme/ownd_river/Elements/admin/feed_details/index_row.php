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
 * [ADMIN] フィード設定　行
 */
?>


<tr>
	<td class="bca-table-listup__tbody-td" class="row-tools bca-table-listup__tbody-td">
		<?php if ($this->BcBaser->isAdminUser()): ?>
			<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['id'], ['type' => 'checkbox', 'class' => 'batch-targets', 'value' => $data['id']]) ?>
		<?php endif ?>		
		<?php $this->BcBaser->link('', $data['url'], array('title' => __d('baser', '確認'), 'target' => '_blank', 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'preview','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('controller' => 'feed_details', 'action' => 'edit', $this->BcForm->value('FeedConfig.id'), $data['id']), array('title' => __d('baser', '編集'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('controller' => 'feed_details', 'action' => 'ajax_delete', $this->BcForm->value('FeedConfig.id'), $data['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'preview','data-bca-btn-size' => 'lg')) ?>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php if ($data['url']): ?>
			<?php $this->BcBaser->link($data['name'], array('controller' => 'feed_details', 'action' => 'edit', $this->BcForm->value('FeedConfig.id'), $data['id'])) ?>
		<?php else: ?>
			<?php echo $data['name'] ?>
		<?php endif; ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['category_filter'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcText->listValue('FeedDetail.cache_time', $data['cache_time']) ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcTime->format('Y-m-d', $data['created']) ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['modified']) ?></td>
</tr>