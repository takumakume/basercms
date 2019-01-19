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
 * [ADMIN] 検索インデックス一覧　テーブル
 */
?>

<?php //$this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn')), array('action' => 'add')) ?>

<div class="bca-data-list__top">
<!-- 一括処理 -->
<?php if ($this->BcBaser->isAdminUser()): ?>
	<div>
		<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
		<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn')) ?>
	</div>
<?php endif ?>
<!-- pagination -->
	<?php $this->BcBaser->element('pagination') ?>
</div>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th class="list-tool bca-table-listup__thead-th bca-table-listup__thead-th--select">
				<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => '<span class="bca-visually-hidden">' . __d('baser', '一括選択'). '</span>']) ?>
			</th>
<th class="bca-table-listup__thead-th">NO</th>
<th class="bca-table-listup__thead-th">タイプ<br />タイトル</th>
<th class="bca-table-listup__thead-th">コンテンツ内容</th>
<th class="bca-table-listup__thead-th">公開状態</th>
<th class="bca-table-listup__thead-th">登録日<br />更新日</th>
<th class="bca-table-listup__thead-th">優先度</th>
<th class="bca-table-listup__thead-th">アクション</th>
</tr>
</thead>
<tbody>
	<?php if (!empty($datas)): ?>
		<?php $count = 0; ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('search_indices/index_row', array('data' => $data, 'count' => $count)) ?>
			<?php $count++; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="8"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
