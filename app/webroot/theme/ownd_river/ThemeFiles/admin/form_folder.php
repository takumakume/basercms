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
 * [ADMIN] テーマフォルダ登録・編集
 */
$params = explode('/', $path);
?>


<!-- current -->
<div class="em-box align-left">
	現在の位置：<?php echo $currentPath ?>
</div>

<?php if ($this->request->action == 'admin_add_folder'): ?>
	<?php echo $this->BcForm->create('ThemeFolder', array('id' => 'TemplateForm', 'url' => array_merge(array('controller' => 'theme_files', 'action' => 'add_folder', $theme, $type), $params))) ?>
<?php else: ?>
	<?php echo $this->BcForm->create('ThemeFolder', array('id' => 'TemplateForm', 'url' => array_merge(array('controller' => 'theme_files', 'action' => 'edit_folder', $theme, $type), $params))) ?>
<?php endif ?>

<?php if($theme	!= 'core' && !$isWritable): ?>
	<div id="AlertMessage">ファイルに書き込み権限がないので編集できません。</div>
<?php endif ?>

<?php echo $this->BcForm->input('ThemeFolder.parent', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('ThemeFolder.pastname', array('type' => 'hidden')) ?>

<!-- form -->
<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('ThemeFolder.name', __d('baser', 'フォルダ名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php if ($this->request->action != 'admin_view_folder'): ?>
					<?php echo $this->BcForm->input('ThemeFolder.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'autofocus' => true)) ?>
					<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
					<div id="helptextName" class="helptext">
						<ul>
							<li>フォルダ名は半角で入力してください。</li>
						</ul>
					</div>
					<?php echo $this->BcForm->error('ThemeFolder.name') ?>
				<?php else: ?>
					<?php echo $this->BcForm->input('ThemeFolder.name', array('type' => 'text', 'size' => 40, 'readonly' => 'readonly')) ?>
				<?php endif ?>
			</td>
		</tr>
	</table>
</div>
<div class="submit bca-actions">
	<?php if ($this->request->action == 'admin_add_folder'): ?>
		<div class="bca-actions__main">
			<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'lg', 'data-bca-btn-width' => 'lg','id' => 'BtnSave')) ?>
		</div>
	<?php elseif ($this->request->action == 'admin_edit_folder'): ?>
		<?php if($isWritable): ?>
			<div class="bca-actions__main">
				<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'lg', 'data-bca-btn-width' => 'lg','id' => 'BtnSave')) ?>
			</div>
			<div class="bca-actions__sub">
				<?php $this->BcBaser->link(__d('baser', '削除'), array_merge(array('action' => 'del', $theme, $type), $params), array('class' => 'submit-token button bca-btn bca-actions__item', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'sm'), sprintf(__d('baser', '%s を本当に削除してもいいですか？'), $this->BcForm->value('ThemeFolder.name')), false	) ?>
			</div>
		<?php endif ?>	
	<?php else: ?>
		<?php if (!$safeModeOn): ?>
			<?php if ($theme == 'core'): ?>
				<?php $this->BcBaser->link(__d('baser', '現在のテーマにコピー'), array_merge(array('action' => 'copy_folder_to_theme', $theme, $plugin, $type), $params), array('class' => 'submit-token btn-red button bca-btn'), sprintf(__d('baser', '本当に現在のテーマ「%s」にコピーしてもいいですか？\n既に存在するファイルは上書きされます。'), Inflector::camelize($siteConfig['theme']))); ?>
			<?php endif ?>
		<?php else: ?>
			<?php echo __d('baser', '機能制限のセーフモードで動作していますので、現在のテーマへのコピーはできません。') ?>
		<?php endif ?>
	<?php endif ?>
</div>

<?php if ($this->request->action == 'admin_add_folder' || $this->request->action == 'admin_edit_folder'): ?>
	<?php $this->BcBaser->link(__d('baser', '一覧に戻る'), array_merge(array('action' => 'index', $theme, $plugin, $type), explode('/', $path)), array('class' => 'btn-gray button bca-btn', 'data-bca-btn-type' => 'back-to-list')); ?>
<?php else: ?>
	<?php $this->BcBaser->link(__d('baser', '一覧に戻る'), array_merge(array('action' => 'index', $theme, $plugin, $type), explode('/', dirname($path))), array('class' => 'btn-gray button bca-btn', 'data-bca-btn-type' => 'back-to-list')); ?>
<?php endif ?>

<?php echo $this->BcForm->end() ?>
