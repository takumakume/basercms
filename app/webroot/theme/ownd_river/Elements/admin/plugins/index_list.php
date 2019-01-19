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
 * [ADMIN] プラグイン一覧　テーブル
 */
?>
<div class="bca-data-list__top">
<!-- 一括処理 -->
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div>
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('publish' => __d('baser', '有効'), 'unpublish' => __d('baser', '無効'), 'del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
			<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn', 'data-bca-btn-size' => 'lg')) ?>
		</div>
	<?php endif ?>

</div>


<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
<thead class="bca-table-listup__thead">
	<tr class="list-tool">
		<th class="list-tool bca-table-listup__thead-th bca-table-listup__thead-th--select"><?php // 一括選択 ?>
			<?php if ($this->BcBaser->isAdminUser()): ?>
				<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => __d('baser', '一括選択')]) ?>
			<?php endif ?>
			<?php if (!$sortmode): ?>
				<?php $this->BcBaser->link('<i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>並び替え', array('sortmode' => 1)) ?>
			<?php else: ?>
				<?php $this->BcBaser->link('<i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>ノーマル', array('sortmode' => 0)) ?>
			<?php endif ?>
		</th>
		<th class="bca-table-listup__thead-th">プラグイン名</th>
		<th class="bca-table-listup__thead-th" style="white-space: nowrap">バージョン</th>
		<th class="bca-table-listup__thead-th">説明</th>
		<th class="bca-table-listup__thead-th">開発者</th>
		<th class="bca-table-listup__thead-th">登録日<br />更新日</th>
		<th class="bca-table-listup__thead-th">アクション</th>
	</tr>
</thead>
<tbody>
	<?php if (!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('plugins/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="6"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>
