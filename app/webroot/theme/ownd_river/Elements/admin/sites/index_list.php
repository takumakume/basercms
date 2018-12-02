<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * サブサイト一覧
 */
$agents = Configure::read('BcAgent');
$devices = [];
foreach($agents as $key => $agent) {
	$devices[$key] = $agent['name'];
}
$languages = Configure::read('BcLang');
$langs = [];
foreach($languages as $key => $lang) {
	$langs[$key] = $lang['name'];
}
?>


<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<!-- ListTable -->
<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th class="list-tool bca-table-listup__thead-th">
				<div>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn bca-table-listup__img', 'hidden' => 'hidden')). __d('baser', '新規追加'), array('action' => 'add'),array('class'=>' bca-table-listup__a bca-btn', 'data-bca-btn-type' => 'add')) ?>
				</div>
			</th>
	<th class="bca-table-listup__thead-th">
		<?php 
		echo $this->Paginator->sort('id', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'NO'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'NO')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		);
		 ?>
	</th>
	<th class="bca-table-listup__thead-th">
		<?php 
		echo $this->Paginator->sort('display_name', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'サイト名'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'サイト名')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
	</th>
	<th class="bca-table-listup__thead-th">
		<?php 
		echo $this->Paginator->sort('name', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '識別名称'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '識別名称')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
		<br>
		<?php 
		echo $this->Paginator->sort('alias', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'エイリアス'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'エイリアス')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
	</th>
	<th class="bca-table-listup__thead-th">
		<?php 
		echo $this->Paginator->sort('status', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '公開状態'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '公開状態')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
	</th>
	<th class="bca-table-listup__thead-th">
		<?php echo $this->Paginator->sort('device', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'デバイス'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'デバイス')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
		<br>
		<?php 
		echo $this->Paginator->sort('lang', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '言語'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '言語')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
	</th>
	<th class="bca-table-listup__thead-th">
		<?php 
		echo $this->Paginator->sort('main_site_id', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'メインサイト'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'メインサイト')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
		<br>
		<?php 
		echo $this->Paginator->sort('theme', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', 'テーマ'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', 'テーマ')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
	</th>
	<th class="bca-table-listup__thead-th">
		<?php 
		echo $this->Paginator->sort('created', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '登録日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '登録日')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
		<br />
		<?php 
		echo $this->Paginator->sort('modified', 
			array('asc' => '<i class="bca-icon--asc"></i>'. __d('baser', '更新日'), 'desc' => '<i class="bca-icon--desc"></i>'. __d('baser', '更新日')),
			array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
		); 
		?>
	</th>
</tr>
</thead>
<tbody class="bca-table-listup__tbody">
	<?php if (!empty($datas)): ?>
		<?php foreach ($datas as $key => $data): ?>
			<?php $this->BcBaser->element('sites/index_row', array('data' => $data, 'count' => ($key + 1), 'langs' => $langs, 'devices' => $devices)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="8" class="bca-table-listup__tbody-td"><p class="no-data">データがありません。</p></td>
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