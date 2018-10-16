<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 2.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] ページ登録・編集フォーム
 */
$this->BcBaser->css('admin/ckeditor/editor', array('inline' => true));
$this->BcBaser->js('admin/pages/edit', false);
?>


<div hidden="hidden">
	<div id="Action"><?php echo $this->request->action ?></div>
</div>

<?php echo $this->BcForm->create('Page') ?>
<?php echo $this->BcForm->input('Page.mode', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('Page.id', array('type' => 'hidden')) ?>

<?php if ($this->action == 'admin_edit'): ?>
  <div class="bca-section bca-section__post-top">
    <span class="bca-post__url">
  <?php //echo $this->BcForm->label('BlogPost.url', 'URL') ?>
      <a href="<?php echo $this->BcBaser->getUri(urldecode($this->request->params['Content']['url']) . '/archives/' . $this->BcForm->value('BlogPost.no')) ?>" class="bca-text-url" target="_blank" data-toggle="tooltip" data-placement="top" title="公開URLを開きます"><i class="bca-icon--globe"></i><?php echo $this->BcBaser->getUri(urldecode($this->request->params['Content']['url']) . '/archives/' . $this->BcForm->value('BlogPost.no')) ?></a>
      <?php echo $this->BcForm->button('', [
        'id' => 'BtnCopyUrl',
        'class' => 'bca-btn',
        'data-bca-btn-type' => 'textcopy',
        'data-bca-btn-category' => 'text',
        'data-bca-btn-size' => 'sm'
      ]) ?>
  </div>
<?php endif; ?>

<div class="bca-section bca-section-editor-area">
	<?php echo $this->BcForm->editor('Page.contents', array_merge(array(
		'editor' => @$siteConfig['editor'],
		'editorUseDraft' => true,
		'editorDraftField' => 'draft',
		'editorWidth' => 'auto',
		'editorHeight' => '480px',
		'editorEnterBr' => @$siteConfig['editor_enter_br']
			), $editorOptions)); ?>
	<?php echo $this->BcForm->error('Page.contents') ?>
</div>

<?php if (BcUtil::isAdminUser()): ?>
<div class="bca-section">
	<table cellpadding="0" cellspacing="0" class="form-table bca-form-table">
		<tr>
			<th class="bca-form-table__label"><?php echo $this->BcForm->label('Page.page_template', __d('baser', '固定ページテンプレート')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Page.page_template', array('type' => 'select', 'options' => $pageTemplateList)) ?>
				<div class="helptext">
					テーマフォルダ内の、Pages/templates テンプレートを配置する事で、ここでテンプレートを選択できます。
				</div>
				<?php echo $this->BcForm->error('Page.page_template') ?>
			</td>
		</tr>
		<tr>
			<th class="bca-form-table__label"><?php echo $this->BcForm->label('Page.code', __d('baser', 'コード')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Page.code', array(
					'type' => 'textarea',
					'cols' => 36,
					'rows' => 5,
					'style' => 'font-size:14px;font-family:Verdana,Arial,sans-serif;'
				)); ?>
				<?php echo $this->Html->image('admin/icn_help.png', array('class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<div class="helptext">
					固定ページの本文には、ソースコードに切り替えてPHPやJavascriptのコードを埋め込む事ができますが、ユーザーが間違って削除してしまわないようにこちらに入力しておく事もできます。<br />
					入力したコードは、自動的にコンテンツ本体の上部に差し込みます。
				</div>
				<?php echo $this->BcForm->error('Page.code') ?>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</div>
<?php endif ?>


<!-- button -->
<div class="bca-section__submit">
  <?php if ($this->action == 'admin_edit' || $this->action == 'admin_add'): ?>
    <div class="bca-section__submit__main">
      <a href="/admin/contents/" class="button bca-btn" data-bca-btn-type="back-to-list">一覧に戻る</a>
      <?php echo $this->BcForm->button(__d('baser', 'プレビュー'),
        array(
          'id' => 'BtnPreview',
          'div' => false,
          'class' => 'button bca-btn',
          'data-bca-btn-type' => 'preview',
        )) ?>
      <?php echo $this->BcForm->button(__d('baser', '保存'),
        array(
          'type' => 'submit',
          'id' => 'BtnSave',
          'div' => false,
          'class' => 'button bca-btn',
          'data-bca-btn-type' => 'save',
          'data-bca-btn-size' => 'xl'
        )) ?>
    </div>
  <?php endif ?>
  <?php if ($this->action == 'admin_edit'): ?>
    <div class="bca-section__submit__sub">
      <?php $this->BcBaser->link(__d('baser', '削除'), array('action' => 'delete', $blogContent['BlogContent']['id'], $this->BcForm->value('BlogPost.id')),
        array(
          'class' => 'submit-token button bca-btn',
          'data-bca-btn-type' => 'delete',
          'data-bca-btn-size' => 'sm',
          'data-bca-btn-color' => 'danger'
        ), sprintf(__d('baser', '%s を本当に削除してもいいですか？ \n ※ 固定ページはゴミ箱に入らず完全に消去されます。'), $this->BcForm->value('BlogPost.name')), false); ?>
    </div>
  <?php endif ?>
</div>


<?php echo $this->BcForm->end(); ?>
