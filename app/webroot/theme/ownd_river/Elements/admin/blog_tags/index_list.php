<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] ブログタグ一覧　テーブル
 */
?>


<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th style="width:160px" class="list-tool bca-table-listup__thead-th">
	<div>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn', 'hidden' => 'hidden')) . __d('baser', '新規追加'), array('action' => 'add'),array('class'=>' bca-table-listup__a bca-btn', 'data-bca-btn-type' => 'add')) ?>
	</div>
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div>
			<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => __d('baser', '一括選択'))) ?>
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'))) ?>
			<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn')) ?>
		</div>
	<?php endif ?>
</th>
<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('id', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', 'NO'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', 'NO')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('name', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', 'ブログタグ名'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', 'ブログタグ名')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
<th class="bca-table-listup__thead-th">
	<?php echo $this->Paginator->sort('created', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', '登録日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', '登録日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?><br />
	<?php echo $this->Paginator->sort('modified', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ' . __d('baser', '更新日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ' . __d('baser', '更新日')), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
</th>
</tr>
</thead>
<tbody class="bca-table-listup__tbody">
	<?php if (!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('blog_tags/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="4"><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。') ?></p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
