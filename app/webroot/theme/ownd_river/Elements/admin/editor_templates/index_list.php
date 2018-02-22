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
 * [ADMIN] エディタテンプレート一覧　テーブル
 */
?>


<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th style="width:140px" class="list-tool bca-table-listup__thead-th">
				<div>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn', 'hidden' => 'hidden')) . __d('baser', '新規追加'), array('action' => 'add'), array( 'class'=> 'bca-btn', 'data-bca-btn-type' => 'add', 'data-bca-btn-size' => 'lg')) ?>
				</div>
			</th>
			<th class="bca-table-listup__thead-th">NO</th>
			<th class="bca-table-listup__thead-th"><?php echo __d('baser', 'テンプレート名')?></th>
			<th class="bca-table-listup__thead-th"><?php echo __d('baser', '説明文')?></th>
			<th class="bca-table-listup__thead-th"><?php echo __d('baser', '登録日')?><br /><?php echo __d('baser', '更新日')?></th>
		</tr>
	</thead>
<tbody>
	<?php if (!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('editor_templates/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="5" class="bca-table-listup__tbody-td"><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。')?></p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>
