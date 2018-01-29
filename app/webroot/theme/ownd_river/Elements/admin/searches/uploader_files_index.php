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

$uploaderCategories = $this->BcForm->getControlSource("Uploader.UploaderFile.uploader_category_id");
if(!isset($listId)) {
	$listId = $this->getVar('listId');
}
?>


<div class="file-filter submit">
	<small style="font-weight:bold">名称</small>&nbsp;<?php echo $this->BcForm->input('Filter.name', array('type' => 'text', 'class' => 'bca-input-text', 'id' => 'FilterName'.$listId, 'class' => 'filter-control', 'style' => 'width:160px')) ?>
<?php if(!empty($uploaderCategories)): ?>
	<small style="font-weight:bold">カテゴリ</small>&nbsp;<?php echo $this->BcForm->input('Filter.uploader_category_id', array('type' => 'select', 'class' => 'bca-select', 'options' => $uploaderCategories, 'empty' => __d('baser', '指定なし'), 'id' => 'FilterUploaderCategoryId'.$listId, 'class' => 'filter-control')) ?>
<?php endif ?>
	<small style="font-weight:bold">タイプ</small>&nbsp;<?php echo $this->BcForm->input('Filter.uploader_type', array('type' => 'radio', 'options' => array('all'=>__d('baser', '指定なし'), 'img' => __d('baser', '画像'), 'etc' => __d('baser', '画像以外')), 'id' => 'FilterUploaderType'.$listId, 'class' => 'filter-control')) ?>
	<?php echo $this->BcForm->submit(__d('baser', '検索'), array('id' => 'BtnFilter'.$listId, 'div' => false, 'class' => 'button filter-control')) ?>
</div>