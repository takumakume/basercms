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
 * [ADMIN] ブログカテゴリ フォーム
 */
$owners = $this->BcForm->getControlSource('BlogCategory.owner_id');
?>


<?php if ($this->action == 'admin_edit'): ?>
	<div class="em-box bca-current-box">
		<p><?php echo __d('baser', 'このカテゴリのURL') ?>：<?php $this->BcBaser->link($this->BcBaser->getUri('/' . $this->request->params['Content']['name'] . '/archives/category/' . $this->BcForm->value('BlogCategory.name')), '/' . $this->request->params['Content']['name'] . '/archives/category/' . $this->BcForm->value('BlogCategory.name'), array('target' => '_blank')) ?></p>
	</div>
<?php endif ?>


<?php /* BlogContent.idを第一引数にしたいが為にURL直書き */ ?>
<?php if ($this->action == 'admin_add'): ?>
	<?php echo $this->BcForm->create('BlogCategory', array('url' => array('controller' => 'blog_categories', 'action' => 'add', $blogContent['BlogContent']['id']))) ?>
	<?php elseif ($this->action == 'admin_edit'): ?>
	<?php echo $this->BcForm->create('BlogCategory', array('url' => array('controller' => 'blog_categories', 'action' => 'edit', $blogContent['BlogContent']['id'], $this->BcForm->value('BlogCategory.id'), 'id' => false))) ?>
<?php endif; ?>

<?php echo $this->BcForm->input('BlogCategory.id', array('type' => 'hidden')) ?>

<!-- form -->
<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<?php if ($this->action == 'admin_edit'): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogCategory.no', 'NO') ?></th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->value('BlogCategory.no') ?>
					<?php echo $this->BcForm->input('BlogCategory.no', array('type' => 'hidden')) ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogCategory.name', __d('baser', 'カテゴリ名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogCategory.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'autofocus' => true)) ?>
				<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->BcForm->error('BlogCategory.name') ?>
				<div id="helptextName" class="helptext">
					<ul>
						<li><?php echo __d('baser', 'URLに利用されます') ?></li>
						<li><?php echo __d('baser', '半角のみで入力してください') ?></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogCategory.title', __d('baser', 'カテゴリタイトル')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogCategory.title', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
				<?php echo $this->BcForm->error('BlogCategory.title') ?>
			</td>
		</tr>
		<?php if ($parents): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogCategory.parent_id', __d('baser', '親カテゴリ')) ?></th>
				<td class="col-input bca-form-table__input">
					<?php
					echo $this->BcForm->input('BlogCategory.parent_id', array(
						'type' => 'select',
						'options' => $parents,
						'escape' => false))
					?>
			<?php echo $this->BcForm->error('BlogCategory.parent_id') ?>
				</td>
			</tr>
		<?php else: ?>
			<?php echo $this->BcForm->input('BlogCategory.parent_id', array('type' => 'hidden')) ?>
		<?php endif ?>
		<?php if ($this->BcBaser->siteConfig['category_permission']): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogCategory.owner_id', __d('baser', '管理グループ')) ?></th>
				<td class="col-input bca-form-table__input">
					<?php if ($this->BcAdmin->isSystemAdmin()): ?>
						<?php
						echo $this->BcForm->input('BlogCategory.owner_id', array(
							'type' => 'select',
							'options' => $owners,
							'empty' => __d('baser', '指定しない')))
						?>
						<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpOwnerId', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
						<?php echo $this->BcForm->error('BlogCategory.owner_id') ?>
					<?php else: ?>
						<?php echo $this->BcText->arrayValue($this->request->data['BlogCategory']['owner_id'], $owners) ?>
						<?php echo $this->BcForm->input('BlogCategory.owner_id', array('type' => 'hidden')) ?>
					<?php endif ?>
					<div id="helptextOwnerId" class="helptext">
						<ul>
							<li><?php echo __d('baser', '管理グループを指定した場合、このカテゴリに属した記事は、管理グループのユーザーしか編集する事ができなくなります。') ?></li>
						</ul>
					</div>
				</td>
			</tr>
		<?php endif ?>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</div>


<!-- button -->
<div class="submit bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn bca-actions__item',
      'data-bca-btn-type' => 'save',
      'data-bca-btn-size' => 'lg',
      'data-bca-btn-width' => 'lg',)) ?>
	</div>
	<?php if ($this->action == 'admin_edit'): ?>
		<div class="bca-actions__sub">
			<?php
			$this->BcBaser->link(__d('baser', '削除'), array('action' => 'delete', $blogContent['BlogContent']['id'], $this->BcForm->value('BlogCategory.id')), array('class' => 'submit-token button bca-btn bca-actions__item', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'sm'), sprintf('%s を本当に削除してもいいですか？', $this->BcForm->value('BlogCategory.name')), false);
			?>
		</div>
	<?php endif ?>
</div>

<?php echo $this->BcForm->end() ?>
