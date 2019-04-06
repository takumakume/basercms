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
 * [ADMIN] ユーザーグループ一覧　テーブル
 */
?>


<script type="text/javascript">
$(function () {
	$('.tag a').css({'text-decoration': 'none'})
});
</script>

<?php /*$this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => __d('baser', '新規追加'), 'class' => 'btn', 'hidden' => 'hidden')) . __d('baser', '新規追加'), array('action' => 'add'), array('class' => ' bca-btn', 'data-bca-btn-type' => 'add'))*/ ?>

<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table bca-form-table" id="ListTable">
<thead>
	<tr>
		<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('id',
        array(
			        'asc' => '<i class="bca-icon--asc" title="昇順"></i>' . __d('baser', 'No'),
              'desc' => '<i class="bca-icon--desc" title="降順"></i>' . __d('baser', 'No')
        ),
        array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('name', 
				array(
					'asc' => '<i class="bca-icon--asc" title="昇順"></i>' . ' ユーザーグループ名', 
					'desc' => '<i class="bca-icon--desc" title="降順"></i>' . ' ユーザーグループ名'), 
				array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')
			) ?>
		</th>
		<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('title', array('asc' => '<i class="bca-icon--asc" title="昇順"></i>' . ' 表示名', 'desc' => '<i class="bca-icon--desc" title="降順"></i>' . ' 表示名'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('created', array('asc' => '<i class="bca-icon--asc" title="昇順"></i>' . ' 登録日', 'desc' => '<i class="bca-icon--desc" title="降順"></i>' . ' 登録日'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?><br />
			<?php echo $this->Paginator->sort('modified', array('asc' => '<i class="bca-icon--asc" title="昇順"></i>' . ' 更新日', 'desc' => '<i class="bca-icon--desc" title="降順"></i>' . ' 更新日'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th">アクション</th>
	</tr>
</thead>
<tbody>
	<?php if (!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('user_groups/index_row', array('data' => $data)) ?>
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