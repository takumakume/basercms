<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Uploader.View
 * @since			baserCMS v 3.0.10
 * @license			http://basercms.net/license/index.html
 */
// IE文字化け対策
header('Content-type: text/html; charset=utf-8');
$users = $this->BcForm->getControlSource("UploaderFile.user_id");
$uploaderCategories = $this->BcForm->getControlSource("UploaderFile.uploader_category_id");
$this->passedArgs['action'] = 'ajax_list';
//==============================================================================
// Ajaxで呼び出される事が前提の為インラインで呼びだし
//==============================================================================
$this->BcBaser->js('admin/vendors/jquery.upload-1.0.0.min');
?>


<div id="DivTableList">

<?php if($listId): ?>
<div id="UploaderForm">
	<?php if(!$installMessage): ?>
	<div>
		<?php if($uploaderCategories): ?>
		<?php echo $this->BcForm->input('UploaderFile.uploader_category_id', array('type' => 'select', 'options' => $uploaderCategories, 'empty' => __d('baser', 'カテゴリ指定なし'), 'id' => 'UploaderFileUploaderCategoryId'.$listId, 'style' => 'width:100px')) ?>&nbsp;
		<?php endif ?>
		<span id="SpanUploadFile<?php echo $listId ?>">
			<?php echo $this->BcForm->input('UploaderFile.file', array('type' => 'file', 'id'=>'UploaderFileFile'.$listId, 'class' => 'uploader-file-file')) ?>
		</span>
	</div>
	<?php endif ?>
</div>
<?php endif ?>


<?php if($installMessage): ?>
<p style="color:#C00;font-weight:bold"><?php echo $installMessage ?></p>
<?php endif ?>

<div class="bca-list-head">
	<?php if(!$listId): ?>
		<div id="UploaderForm">
	<?php if(!$installMessage): ?>
		<div>
			<label for="UploaderFileUploaderCategoryId">アップロード</label>
			<?php if($uploaderCategories): ?>
				<?php echo $this->BcForm->input('UploaderFile.uploader_category_id', array('type' => 'select', 'options' => $uploaderCategories, 'empty' => __d('baser', 'カテゴリ指定なし'), 'id' => 'UploaderFileUploaderCategoryId'.$listId)) ?>
			<?php endif ?>
				<span id="SpanUploadFile<?php echo $listId ?>">
					<?php echo $this->BcForm->input('UploaderFile.file', array('type' => 'file', 'id'=>'UploaderFileFile'.$listId, 'class' => 'uploader-file-file')) ?>
				</span>
		</div>
	<?php endif ?>
		</div>
	<?php endif ?>

	<?php $this->BcBaser->element('pagination') ?>
</div>

<div class="file-list-body clearfix corner5">

<table class="bca-table-listup">

<thead class="bca-table-listup__thead">
	<tr>
		<th class="bca-table-listup__thead-th">NO</th>
		<th class="bca-table-listup__thead-th">イメージ</th>
		<th class="bca-table-listup__thead-th">カテゴリ</th>
		<th class="bca-table-listup__thead-th">ファイル名<br />説明文</th>
		<th class="bca-table-listup__thead-th">公開状態</th>
		<th class="bca-table-listup__thead-th">投稿者</th>
		<th class="bca-table-listup__thead-th">投稿日<br />編集日</th>
		<th class="bca-table-listup__thead-th">アクション</th>
	</tr>
</thead>
<?php if ($files): ?>
<tbody>
	<?php foreach ($files as $file): ?>
		<?php $this->BcBaser->element('uploader_files/index_row', array('file' => $file, 'users' => $users, 'uploaderCategories' => $uploaderCategories)) ?>
	<?php endforeach ?>
</tbody>
<?php else: ?>
<tbody><tr><td colspan="8" class="no-data">ファイルが存在しません</td></tr></tbody>
<?php endif ?>
</table>

</div>

</div>