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
 * [ADMIN] ユーザー一覧　テーブル
 */
?>

<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
<thead class="bca-table-listup__thead">
	<tr>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('id',
        array(
			        'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'No'),
              'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'No')
        ),
        array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('name', 
				array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'アカウント名'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'アカウント名')
				),
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('nickname', 
				array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'ニックネーム'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'ニックネーム')
				), 
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('user_group_id', 
				array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', 'グループ'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', 'グループ')
				), 
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('real_name_1', 
				array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', '氏名'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', '氏名')
				), 
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('created', 
				array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', '登録日'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', '登録日')
				), 
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?><br />
			<?php echo $this->Paginator->sort('modified', 
				array(
					'asc' => '<i class="bca-icon--asc"></i>' . __d('baser', '更新日'),
					'desc' => '<i class="bca-icon--desc"></i>' . __d('baser', '更新日')
				), 
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th">アクション</th>
	</tr>
</thead>
<tbody>
	<?php if (!empty($users)): ?>
		<?php foreach ($users as $data): ?>
			<?php $this->BcBaser->element('users/index_row', array('data' => $data)) ?>
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
