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


<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th class="list-tool bca-table-listup__thead-th">
	<div>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn','hidden' => 'hidden')) . __d('baser', '新規追加'), array('action' => 'add', $mailContent['MailContent']['id']),array('class'=>' bca-table-listup__a bca-btn', 'data-bca-btn-type' => 'add')) ?>
		<?php if (!$sortmode): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_sort.png', array('width' => 65, 'height' => 14, 'alt' => __d('baser', '並び替え'), 'class' => 'btn')), array($mailContent['MailContent']['id'], 'sortmode' => 1)) ?>
		<?php else: ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_normal.png', array('width' => 65, 'height' => 14, 'alt' => __d('baser', 'ノーマル'), 'class' => 'btn')), array($mailContent['MailContent']['id'], 'sortmode' => 0)) ?>
		<?php endif ?>
	</div>
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div>
			<?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'title' => __d('baser', '一括選択')]) ?>
			<label for="ListToolCheckall" data-bca-checkbox-size="sm" class="bca-checkbox-label"></label>
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('publish' => __d('baser', '有効'), 'unpublish' => __d('baser', '無効'), 'del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
			<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn')) ?>
		</div>
	<?php endif ?>
</th>
<th class="bca-table-listup__thead-th">NO</th>
<th class="bca-table-listup__thead-th">フィールド名<br />項目名</th>
<th class="bca-table-listup__thead-th">タイプ</th>
<th class="bca-table-listup__thead-th">グループ名</th>
<th class="bca-table-listup__thead-th">必須</th>
<th class="bca-table-listup__thead-th">登録日<br />更新日</th>
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
