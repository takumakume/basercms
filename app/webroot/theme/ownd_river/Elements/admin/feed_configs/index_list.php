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

<div class="bca-data-list__top">
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div class="bca-action-table-listup">
			<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => '一括選択')) ?>
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => '削除'), 'empty' => '一括処理')) ?>
			<?php echo $this->BcForm->button('適用', array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class'=>'bca-btn')) ?>
		</div>
	<?php endif ?>
	<div class="bca-data-list__sub">
		<!-- pagination -->
		<?php $this->BcBaser->element('pagination') ?>
	</div>
</div>

<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th style="width:160px" class="list-tool bca-table-listup__thead-th">
	<div>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'class' => 'bca-table-listup__img', 'alt' => '新規追加', 'class' => 'btn', 'hidden' => 'hidden')).'新規追加', array('action' => 'add'), array( 'class'=> 'bca-btn', 'data-bca-btn-type' => 'add', 'data-bca-btn-size' => 'lg')) ?>
	</div>
</th>
<th class="bca-table-listup__thead-th">
	<?php 
	echo $this->Paginator->sort('id', 
		array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', ' NO'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', ' NO')),
		array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
	); 
	?>
	</th>
<th class="bca-table-listup__thead-th">
	<?php 
	echo $this->Paginator->sort('name', 
		array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', ' フィード設定名'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', ' フィード設定名')),
		array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
	); 
	?>
	</th>
<th class="bca-table-listup__thead-th">
	<?php 
	echo $this->Paginator->sort('display_number', 
		array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', ' 表示件数'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', ' 表示件数')),
		array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
	); 
	?>
	</th>
<th class="bca-table-listup__thead-th">
	<?php 
	echo $this->Paginator->sort('created', 
		array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', ' 登録日'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', ' 登録日')),
		array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
	<br />
	<?php 
	echo $this->Paginator->sort('modified', 
		array('asc' => '<i class="bca-icon--asc"></i>'. ' ' . __d('baser', ' 更新日'), 'desc' => '<i class="bca-icon--desc"></i>'. ' ' . __d('baser', ' 更新日')),
		array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
	); 
	?>
	</th>
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


<div class="bca-data-list__bottom">
	<div class="bca-data-list__sub">
		<!-- list-num -->
		<?php $this->BcBaser->element('list_num') ?>
	</div>
</div>
