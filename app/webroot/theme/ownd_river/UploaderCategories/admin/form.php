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
?>
<!-- form -->
<?php echo $this->BcForm->create('UploaderCategory') ?>
<?php echo $this->BcForm->input('UploaderCategory.id', array('type' => 'hidden')) ?>

<table cellpadding="0" cellspacing="0" class="list-table bca-form-table id="ListTable">
<?php if($this->action == 'admin_edit'): ?>
	<tr>
		<th class="bca-form-table__label"><?php echo $this->BcForm->label('UploaderCategory.id', 'NO') ?></th>
		<td class="bca-form-table__input">
			<?php echo $this->BcForm->value('UploaderCategory.id') ?>
			<?php echo $this->BcForm->input('UploaderCategory.id', array('type' => 'hidden')) ?>
		</td>
	</tr>
<?php endif; ?>
	<tr>
		<th class="bca-form-table__label"><?php echo $this->BcForm->label('UploaderCategory.name', __d('baser', 'カテゴリ名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
		<td class="bca-form-table__input">
			<?php echo $this->BcForm->input('UploaderCategory.name', array('type' => 'text', 'size' => 40, 'maxlength' => 50, 'autofocus' => true)) ?>
			<?php echo $this->BcForm->error('UploaderCategory.name') ?>
		</td>
	</tr>
</table>

<div class="submit bca-actions">
<?php if($this->action == 'admin_add'): ?>
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '登録'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'lg', 'data-bca-btn-width' => 'lg',)) ?>
	</div>
<?php else: ?>
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '更新'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'lg', 'data-bca-btn-width' => 'lg',)) ?>
	</div>
	<div class="bca-actions__sub">
		<?php $this->BcBaser->link(__d('baser', '削除'),
			array('action' => 'delete', $this->BcForm->value('UploaderCategory.id')),
			array('class' => 'submit-token button bca-btn bca-actions__item', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'sm'),
			sprintf(__d('baser', '%s を本当に削除してもいいですか？'), $this->BcForm->value('UploaderCategory.name')),
			false); ?>
	</div>
<?php endif ?>
</div>

<?php echo $this->BcForm->end() ?>
