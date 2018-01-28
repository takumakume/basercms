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
 * [ADMIN] フィード設定一覧　テーブル
 */
?>


<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th style="width:160px" class="list-tool bca-table-listup__thead-th">
	<div>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'class' => 'bca-table-listup__img', 'alt' => '新規追加', 'class' => 'btn', 'hidden' => 'hidden')).'新規追加', array('action' => 'add'), array( 'class'=> 'bca-btn', 'data-bca-btn-type' => 'add', 'data-bca-btn-size' => 'lg')) ?>
	</div>
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div>
			<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => '一括選択')) ?>
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => '削除'), 'empty' => '一括処理')) ?>
			<?php echo $this->BcForm->button('適用', array('id' => 'BtnApplyBatch', 'disabled' => 'disabled')) ?>
		</div>
	<?php endif ?>
</th>
<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('id', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' NO', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' NO'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('name', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' フィード設定名', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' フィード設定名'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('display_number', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 表示件数', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 表示件数'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('created', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 登録日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 登録日'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?><br />
	<?php echo $this->Paginator->sort('modified', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 更新日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 更新日'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
</tr>
</thead>
<tbody>
	<?php if (!empty($feedConfigs)): ?>
		<?php foreach ($feedConfigs as $data): ?>
			<?php $this->BcBaser->element('feed_configs/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="7"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>


<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
