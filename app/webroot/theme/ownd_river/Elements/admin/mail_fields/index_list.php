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
 * [ADMIN] メールフィールド 一覧　テーブル
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
		<tr>
      <th class="list-tool bca-table-listup__thead-th bca-table-listup__thead-th--select"><?php // 一括選択 ?>
        <?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => __d('baser', '一括選択')]) ?>
		<?php if (!$sortmode): ?>
			<?php $this->BcBaser->link('<i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>並び替え', array('sortmode' => 1, $this->request->params['pass'][0])) ?>
		<?php else: ?>
			<?php $this->BcBaser->link('<i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>ノーマル', array('sortmode' => 0, $this->request->params['pass'][0])) ?>
		<?php endif ?>

			</th>
<th class="bca-table-listup__thead-th">NO</th>
<th class="bca-table-listup__thead-th">フィールド名<br />項目名</th>
<th class="bca-table-listup__thead-th">タイプ</th>
<th class="bca-table-listup__thead-th">グループ名</th>
<th class="bca-table-listup__thead-th">必須</th>
<th class="bca-table-listup__thead-th">登録日<br />更新日</th>
<th class="bca-table-listup__thead-th"><?php echo __d('baser', 'アクション') ?></th>
</tr>
</thead>
<tbody>
	<?php if (!empty($datas)): ?>
		<?php $count = 1; ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('mail_fields/index_row', array('data' => $data, 'count' => $count)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan="9"><p class="no-data">データが見つかりませんでした。</p></td></tr>
	<?php endif; ?>
</tbody>
</table>
