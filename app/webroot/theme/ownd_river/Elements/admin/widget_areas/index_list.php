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
 * [ADMIN] ウィジェットエリア一覧 テーブル
 */
?>
<div class="bca-data-list__top">
<!-- 一括処理 -->
<?php if ($this->BcBaser->isAdminUser()): ?>
	<div class="bca-action-table-listup">
		<?php echo $this->BcForm->input('ListTool.batch', ['type' => 'select', 'options' => array('del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'), 'data-bca-select-size' =>'lg']) ?>
		<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn', 'data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn bca-table-listup__img', 'hidden' => 'hidden')) . __d('baser', '新規追加'), array('action' => 'add'), array('class'=>'bca-table-listup__a bca-btn', 'data-bca-btn-size' => 'lg', 'data-bca-btn-type' => 'add')) ?>
	</div>
<?php endif ?>
  <div class="bca-data-list__sub">
    <!-- list-num -->
    <?php $this->BcBaser->element('list_num') ?>
    <!-- pagination -->
    <?php $this->BcBaser->element('pagination') ?>
  </div>
</div>


<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
<thead class="bca-table-listup__thead">
	<tr class="">
		<th class="list-tool bca-table-listup__thead-th  bca-table-listup__thead-th--select">
			<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'title' => __d('baser', '一括選択')]) ?>
			<label for="ListToolCheckall" data-bca-checkbox-size="sm" class="bca-checkbox-label"></label>
		</th>
		<th class="bca-table-listup__thead-th">NO</th>
		<th class="bca-table-listup__thead-th">ウィジェットエリア名</th>
		<th class="bca-table-listup__thead-th">登録ウィジェット数</th>
		<th class="bca-table-listup__thead-th">登録日<br />更新日</th>
		<th class="bca-table-listup__thead-th"><?php // アクション ?>
			<?php echo __d('baser', 'アクション') ?>
		</th>

	</tr>
</thead>
<tbody class="bca-table-listup__tbody">
	<?php if (!empty($widgetAreas)): ?>
		<?php foreach ($widgetAreas as $data): ?>
			<?php $this->BcBaser->element('widget_areas/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="8"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>
