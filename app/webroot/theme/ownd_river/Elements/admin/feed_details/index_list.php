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
 * [ADMIN] フィード設定一覧
 */
?>


<?php if ($this->action != 'admin_add'): ?>

	<?php
	$this->BcBaser->js(array(
		'admin/libs/jquery.baser_ajax_data_list',
		'admin/libs/jquery.baser_ajax_batch',
		'admin/libs/baser_ajax_data_list_config',
		'admin/libs/baser_ajax_batch_config'
	));
	?>

<?php
$this->BcBaser->i18nScript([
    'message1' => __d('baser', 'データがありません。')
]);
?>
	<script type="text/javascript">
$(function(){
	$.baserAjaxBatch.config.methods.del.result = function() {
		var config = $.baserAjaxBatch.config;
		var colspan = $(config.targetCheckbox+":checked:first").parent().parent().find('td').length;
		$(config.targetCheckbox+":checked").parent().parent().fadeOut(300, function(){
			$(this).remove();
			if($(config.listTable+" tbody td").length) {
				$.baserAjaxDataList.initList();
				$(config.listTable+" tbody tr").removeClass('even odd');
				$.yuga.stripe();
			} else {
				$(config.listTable+" tbody").append('<td colspan="'+colspan+'"><p class="no-data">'+bcI18n.message1+'</p></td>');
			}
		});
	};
	$.baserAjaxDataList.config.methods.del.result = function(row, result) {
		var config = $.baserAjaxDataList.config;
		var colspan = $(config.dataList+" tbody td").length
		if(result) {
			row.fadeOut(300, function(){
				row.remove();
				if($(config.dataList+" tbody td").length) {
					$.baserAjaxDataList.initList();
					$(config.dataList+" tbody tr").removeClass('even odd');
					$.yuga.stripe();
				} else {
					$(config.dataList+" tbody").append('<td colspan="'+colspan+'"><p class="no-data">'+bcI18n.message1+'</p></td>');
				}
			});
		} else {
			$(config.alertBox).html('削除に失敗しました。');
			$(config.alertBox).fadeIn(500);
		}
	};
	$.baserAjaxDataList.init();
	$.baserAjaxBatch.init({ url: $("#AjaxBatchUrl").html()});
});
	</script>

	<div id="AjaxBatchUrl" style="display:none"><?php $this->BcBaser->url(array('plugin' => 'feed', 'controller' => 'feed_details', 'action' => 'ajax_batch', $this->request->params['pass'][0])) ?></div>

	<div class="section">

		<div class="bca-main__header">
		<h2 class="bca-main__header-title" data-bca-heading-size="lg" id="headFeedDetail">
			<?php echo __d('baser', 'フィード一覧')?> 
		</h2>
		<div class="bca-main__header-actions">
			<a href="/admin/feed/feed_details/add/<?php echo $this->BcForm->value('FeedConfig.id') ?>" title="新規追加" class="bca-btn" data-bca-btn-type="add" data-bca-btn-size="sm">新規記事追加</a>	
		</div>
	</div>
		<div class="bca-data-list__top">
			<!-- 一括処理 -->
			<?php if ($this->BcBaser->isAdminUser()): ?>
				<div class="bca-action-table-listup">
					<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => __d('baser', '削除')), 'empty' => __d('baser', '一括処理'), 'data-bca-select-size' =>'lg')) ?>
					<?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled' , 'class' => 'bca-btn', 'data-bca-btn-size' => 'lg')) ?>
				</div>
			<?php endif ?>
		</div>

		<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
			<thead class="bca-table-listup__thead">
				<tr>
      <th class="list-tool bca-table-listup__thead-th bca-table-listup__thead-th--select"><?php // 一括選択 ?>
        <?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => __d('baser', '一括選択')]) ?>
      </th>
			</th>
			<th scope="col" class="bca-table-listup__thead-th"><?php echo __d('baser', 'フィード名')?></th>
			<th scope="col" class="bca-table-listup__thead-th"><?php echo __d('baser', 'カテゴリフィルター')?></th>
			<th scope="col" class="bca-table-listup__thead-th"><?php echo __d('baser', 'キャッシュ時間')?></th>
			<th scope="col" class="bca-table-listup__thead-th"><?php echo __d('baser', '登録日')?><br /><?php echo __d('baser', '更新日')?></th>
			<th scope="col" class="bca-table-listup__thead-th"><?php echo __d('baser', 'アクション')?></th>
			</tr>
			</thead>
			<tbody>
				<?php if (!empty($feedConfig['FeedDetail'])): ?>
					<?php foreach ($feedConfig['FeedDetail'] as $feedDetail): ?>
						<?php $this->BcBaser->element('feed_details/index_row', array('data' => $feedDetail)) ?>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="6"><p class="no-data"><?php echo __d('baser', 'データが見つかりませんでした。「追加する」ボタンをクリックしてフィード詳細を登録してください。')?></p></td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>

	</div>

<?php endif ?>
