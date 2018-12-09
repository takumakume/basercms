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
 * [ADMIN] フィード設定 フォーム
 */
?>


<script type="text/javascript">
$(function(){
	$("#EditTemplate").click(function(){
		if(confirm('フィード設定を保存して、テンプレート '+$("#FeedConfigTemplate").val()+' の編集画面に移動します。よろしいですか？')){
			$("#FeedConfigEditTemplate").val(true);
			$("#FeedConfigAdminEditForm").submit();
		}
	});
});
</script>

<?php echo $this->BcForm->create('FeedConfig') ?>

<section class="bca-section" data-bca-section-type='form-group'>

	<h2 class="bca-main__heading" data-bca-heading-size="lg">基本項目</h2>

	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<?php if ($this->action == 'admin_edit'): ?>
			<tr>
				<th class="col-head bca-form-table__label">
					<?php echo $this->BcForm->label('FeedConfig.id', 'NO') ?>&nbsp;<span class="required bca-label" data-bca-label-type="required"><?php echo __d('baser', '必須') ?></span>
				</th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->value('FeedConfig.id') ?>
					<?php echo $this->BcForm->input('FeedConfig.id', array('type' => 'hidden')) ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('FeedConfig.name', __d('baser', 'フィード設定名')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required"><?php echo __d('baser', '必須') ?></span>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedConfig.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'autofocus' => true)) ?>
				<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->BcForm->error('FeedConfig.name') ?>
				<div id="helptextName" class="helptext">
					<ul>
						<li>日本語が利用できます。</li>
						<li>識別でき、わかりやすい設定名を入力します。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('FeedConfig.display_number', __d('baser', '表示件数')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required"><?php echo __d('baser', '必須') ?></span>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedConfig.display_number', array('type' => 'text', 'size' => 10, 'maxlength' => 3)) ?>件
				<?php echo $this->BcForm->error('FeedConfig.display_number') ?>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</section>

<section class="bca-section" data-bca-section-type='form-group'>
	<h2 class="btn-slide-form"><a href="javascript:void(0)" id="FormOption">オプション</a></h2>
	<table cellpadding="0" cellspacing="0" class="form-table bca-form-table slide-body" id="FormOptionBody">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedConfig.feed_title_index', __d('baser', 'フィードタイトルリスト')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedConfig.feed_title_index', array('type' => 'textarea', 'cols' => 36, 'rows' => 3)) ?>
				<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpFeedTitleIndex', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->BcForm->error('FeedConfig.feed_title_index') ?>
				<div id="helptextFeedTitleIndex" class="helptext">
					<ul>
						<li>一つの表示フィードに対し、複数のフィードを読み込む際、フィードタイトルを表示させたい場合は、フィードタイトルを「|」で区切って入力してください。</li>
						<li>テンプレート上で、「feed_title」として参照できるようになります。</li>
						<li>また、先頭から順に「feed_title_no」としてインデックス番号が割り振られます。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedConfig.category_index', __d('baser', 'カテゴリリスト')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedConfig.category_index', array('type' => 'textarea', 'cols' => 36, 'rows' => 3)) ?>
				<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpCategoryIndex', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->BcForm->error('FeedConfig.category_index') ?>
				<div id="helptextCategoryIndex" class="helptext">
					<ul>
						<li>カテゴリにインデックス番号を割り当てたい場合は、カテゴリ名を「|」で区切って入力してください。</li>
						<li>先頭から順に「category_no」としてインデックス番号が割り振られます。</li>
					</ul>
				</div>

			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedConfig.template', __d('baser', 'テンプレート名')) ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedConfig.template', array('type' => 'select', 'options' => $this->Feed->getTemplates())) ?>
				<?php echo $this->BcForm->input('FeedConfig.edit_template', array('type' => 'hidden')) ?>
				<?php if ($this->action == 'admin_edit'): ?>
					<?php $this->BcBaser->link('≫ 編集する', 'javascript:void(0)', array('id' => 'EditTemplate')) ?>
				<?php endif ?>
				<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpTemplate', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->BcForm->error('FeedConfig.template') ?>
				<div id="helptextTemplate" class="helptext">
					<ul>
						<li>出力するフィードのテンプレートを指定します。</li>
						<li>「編集する」からテンプレートの内容を編集する事ができます。</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm('option') ?>
	</table>
</section>

<!-- button -->
<div class="bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '保存'), 
			array(
				'type' => 'submit',
				'id' => 'BtnSave',
				'div' => false,
				'class' => 'button bca-btn bca-actions__item',
				'data-bca-btn-type' => 'save',
				'data-bca-btn-size' => 'xl'
		)); ?>
	</div>
	<?php if ($this->action == 'admin_edit'): ?>
		<div class="bca-actions__sub">
			<?php $this->BcBaser->link(__d('baser', '削除'), 
				array('action' => 'delete', $this->BcForm->value('FeedConfig.id')), 
					array(
						'class' => 'submit-token button bca-btn bca-actions__item', 
						'data-bca-btn-type'=>'delete',
						'data-bca-btn-size' => 'sm',
						'data-bca-btn-color' => 'danger'
						), 
					sprintf(__d('baser', '%s を本当に削除してもいいですか？'), 
					$this->BcForm->value('FeedConfig.name')
					), 
					false);
			?>
		</div>
	<?php endif ?>
</div>

<?php echo $this->BcForm->end() ?>


<div id="AlertMessage" class="message" style="display:none"></div>
<div id="MessageBox" style="display:none"><div id="flashMessage" class="notice-message"></div></div>
<div id="DataList" class="bca-data-list"><?php $this->BcBaser->element('feed_details/index_list') ?></div>
