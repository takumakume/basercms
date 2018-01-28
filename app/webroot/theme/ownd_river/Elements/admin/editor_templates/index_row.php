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
 * [ADMIN] エディタテンプレート一覧　行
 */
?>


<tr>
	<td class="row-tools bca-table-listup__tbody-td">
		<?php $this->BcBaser->link('', array('action' => 'edit', $data['EditorTemplate']['id']), array('title' => '編集', 'class' => ' bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['EditorTemplate']['id']), array('title' => '削除', 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete','data-bca-btn-size' => 'lg')) ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['EditorTemplate']['id'] ?></td>
	<td class="bca-table-listup__tbody-td">
		<?php if ($data['EditorTemplate']['image']): ?>
			<?php $this->BcBaser->img('/files/editor/' . $data['EditorTemplate']['image'], array('url' => array('action' => 'edit', $data['EditorTemplate']['id']), 'alt' => $data['EditorTemplate']['name'], 'title' => $data['EditorTemplate']['name'], 'style' => 'float:left;margin-right:10px;height:36px')) ?>
		<?php endif ?>
		<?php $this->BcBaser->link($data['EditorTemplate']['name'], array('action' => 'edit', $data['EditorTemplate']['id'])) ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['EditorTemplate']['description']; ?></td>
	<td class="bca-table-listup__tbody-td" style="white-space:nowrap"><?php echo $this->BcTime->format('Y-m-d', $data['EditorTemplate']['created']) ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['EditorTemplate']['modified']) ?></td>
</tr>