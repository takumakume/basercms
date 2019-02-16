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
 * [ADMIN] ブログタグ フォーム
 */
?>


<!-- form -->
<?php echo $this->BcForm->create('BlogTag') ?>
<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<?php if ($this->action == 'admin_edit'): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogTag.id', __d('baser', 'NO')) ?></th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->value('BlogTag.id') ?>
					<?php echo $this->BcForm->input('BlogTag.id', array('type' => 'hidden')) ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogTag.name', __d('baser', 'ブログタグ名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogTag.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'autofocus' => true)) ?>
				<?php echo $this->BcForm->error('BlogTag.name') ?>
			</td>
		</tr>

		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</div>
<!-- button -->
<div class="submit bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'id' => 'BtnSave',
      'data-bca-btn-type' => 'save',
      'data-bca-btn-size' => 'lg',
      'data-bca-btn-width' => 'lg',)) ?>
	</div>
	<?php if ($this->action == 'admin_edit'): ?>
		<div class="bca-actions__sub">
			<?php
			$this->BcBaser->link(__d('baser', '削除'), array('action' => 'delete', $this->BcForm->value('BlogTag.id')), array('class' => 'submit-token button bca-btn bca-actions__item', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'sm'), sprintf(__d('baser', '%s を本当に削除してもいいですか？'), $this->BcForm->value('BlogTag.name')), false);
			?>
		</div>
	<?php endif ?>
</div>

<?php echo $this->BcForm->end() ?>
