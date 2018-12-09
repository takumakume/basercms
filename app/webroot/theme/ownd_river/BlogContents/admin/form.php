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
 * [ADMIN] ブログコンテンツ フォーム
 */
$this->BcBaser->js('Blog.admin/blog_contents/edit', false);
?>

<?php echo $this->BcForm->create('BlogContent') ?>
<?php echo $this->BcForm->input('BlogContent.id', array('type' => 'hidden')) ?>

<section class="bca-section" data-bca-section-type="form-group">
	<table class="form-table bca-form-table" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.description', __d('baser', 'ブログ説明文')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->ckeditor('BlogContent.description', array(
					'editorWidth' => 'auto',
					'editorHeight' => '120px',
					'editorToolType' => 'simple',
					'editorEnterBr' => @$siteConfig['editor_enter_br']
				))
				?>
<?php echo $this->BcForm->error('BlogContent.description') ?>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.list_count', __d('baser', '一覧表示件数')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogContent.list_count', array('type' => 'text', 'size' => 20, 'maxlength' => 255)) ?>&nbsp;件&nbsp;
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpListCount', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('BlogContent.list_count') ?>
				<div id="helptextListCount" class="helptext">
					<ul>
						<li><?php echo __d('baser', '公開サイトの一覧に表示する件数を指定します。') ?></li>
						<li><?php echo __d('baser', '半角数字で入力してください。') ?></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.list_direction', __d('baser', '一覧に表示する順番')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogContent.list_direction', array('type' => 'select', 'options' => array('DESC' => __d('baser', '新しい記事順'), 'ASC' => __d('baser', '古い記事順')))) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpListDirection', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
<?php echo $this->BcForm->error('BlogContent.list_direction') ?>
				<div id="helptextListDirection" class="helptext">
					<ul>
						<li><?php echo __d('baser', '公開サイトの一覧における記事の並び方向を指定します。') ?></li>
						<li><?php echo __d('baser', '新しい・古いの判断は投稿日が基準となります。') ?></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.list_count', __d('baser', 'RSSフィード出力件数')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogContent.feed_count', array('type' => 'text', 'size' => 20, 'maxlength' => 255)) ?>&nbsp;件&nbsp;
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpFeedCount', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('BlogContent.feed_count') ?>
				<div id="helptextFeedCount" class="helptext">
					<ul>
						<li><?php echo __d('baser', 'RSSフィードに出力する件数を指定します。') ?></li>
						<li><?php echo __d('baser', '半角数字で入力してください。') ?></li>
							<?php if ($this->action == 'admin_edit'): ?>
							<li><?php echo __d('baser', 'RSSフィードのURL') ?>&nbsp;
							<?php $this->BcBaser->link(Router::url('/' . $this->BcForm->value('Content.name') . '/index.rss', true), '/' . $this->BcForm->value('Content.name') . '/index.rss', array('target' => '_blank')) ?>
							</li>
							<?php endif ?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.comment_use', __d('baser', 'コメント受付機能')) ?></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('BlogContent.comment_use', array('type' => 'checkbox', 'label' => __d('baser', '利用する'))) ?>
<?php echo $this->BcForm->error('BlogContent.comment_use') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.comment_approve', __d('baser', 'コメント承認機能')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogContent.comment_approve', array('type' => 'checkbox', 'label' => __d('baser', '利用する'))) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpCommentApprove', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('BlogContent.comment_approve') ?>
				<div id="helptextCommentApprove" class="helptext"><?php echo __d('baser', '承認機能を利用すると、コメントが投稿されてもすぐに公開されず、管理者側で確認する事ができます。') ?></div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.auth_capthca', __d('baser', 'コメントイメージ認証')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('BlogContent.auth_captcha', array('type' => 'checkbox', 'label' => __d('baser', '利用する'))) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpAuthCaptcha', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
<?php echo $this->BcForm->error('BlogContent.auth_captcha') ?>
				<div id="helptextAuthCaptcha" class="helptext">
					<ul>
						<li><?php echo __d('baser', 'ブログコメント送信の際、表示された画像の文字入力させる事で認証を行ないます。') ?></li>
						<li><?php echo __d('baser', 'スパムなどいたずら送信が多いが多い場合に設定すると便利です。') ?></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.tag_use', __d('baser', 'タグ機能')) ?></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('BlogContent.tag_use', array('type' => 'checkbox', 'label' => __d('baser', '利用する'))) ?>
<?php echo $this->BcForm->error('BlogContent.tag_use') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.widget_area', __d('baser', 'ウィジェットエリア')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input('BlogContent.widget_area', array(
					'type' => 'select',
					'options' => $this->BcForm->getControlsource('WidgetArea.id'),
					'empty' => __d('baser', 'サイト基本設定に従う')))
				?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpWidgetArea', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('BlogContent.widget_area') ?>
				<div id="helptextWidgetArea" class="helptext">
					<?php echo __d('baser', 'ブログコンテンツで利用するウィジェットエリアを指定します。') ?><br>
					<?php echo __d('baser', 'ウィジェットエリアはウィジェットエリア管理より追加できます。') ?><br>
					<ul><li><?php $this->BcBaser->link(__d('baser', 'ウィジェットエリア管理'), array('plugin' => null, 'controller' => 'widget_areas', 'action' => 'index')) ?></li></ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.template', __d('baser', 'コンテンツテンプレート名')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input('BlogContent.template', array(
					'type' => 'select',
					'options' => $this->Blog->getBlogTemplates($this->BcForm->value('Content.site_id'))))
				?>
<?php echo $this->BcForm->input('BlogContent.edit_blog_template', array('type' => 'hidden')) ?>
<?php if ($this->action == 'admin_edit'): ?>
	<?php $this->BcBaser->link('<i class="bca-icon--edit"></i>' . __d('baser', '編集する'), 'javascript:void(0)', array('id' => 'EditBlogTemplate')) ?>
<?php endif ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpTemplate', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('BlogContent.template') ?>
				<div id="helptextTemplate" class="helptext">
					<ul>
						<li><?php echo __d('baser', 'ブログの本体のテンプレートを指定します。') ?></li>
						<li><?php echo __d('baser', '「編集する」からテンプレートの内容を編集する事ができます。') ?></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.eye_catch_size_width', __d('baser', 'アイキャッチ画像サイズ')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
        <table class="bca-table" data-bca-table-type="type1">
          <thead>
          <tr>
            <th></th>
            <th><?php echo __d('baser', '幅') ?></th>
            <th><?php echo __d('baser', '高さ') ?></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th><?php echo __d('baser', 'PCサイズ') ?></th>
            <td><?php echo $this->BcForm->input('BlogContent.eye_catch_size_thumb_width', array('type' => 'text', 'size' => '8')) ?>&nbsp;px</td>
            <td><?php echo $this->BcForm->input('BlogContent.eye_catch_size_thumb_height', array('type' => 'text', 'size' => '8')) ?> px</td>
          </tr>
          <tr>
            <th><?php echo __d('baser', '携帯サイズ') ?></th>
            <td><?php echo $this->BcForm->input('BlogContent.eye_catch_size_mobile_thumb_width', array('type' => 'text', 'size' => '8')) ?>&nbsp;px</td>
            <td><?php echo $this->BcForm->input('BlogContent.eye_catch_size_mobile_thumb_height', array('type' => 'text', 'size' => '8')) ?> px</td>
          </tr>
          </tbody>
        </table>
<?php echo $this->BcForm->error('BlogContent.eye_catch_size') ?>
				<div id="helptextTemplate" class="helptext">
					<ul>
						<li><?php echo __d('baser', 'アイキャッチ画像のサイズを指定します。') ?></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BlogContent.use_content', __d('baser', '記事概要')) ?></th>
			<td class="col-input bca-form-table__input">
	<?php echo $this->BcForm->input('BlogContent.use_content', array('type' => 'checkbox', 'label' => __d('baser', '利用する'))) ?>
	<?php echo $this->BcForm->error('BlogContent.use_content') ?>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm('option') ?>
	</table>
</section>

<!-- button -->
<div class="bca-section-options">
<?php /* ToDo
  * 送信ボタン系とフォームコンテンツの出力を切り分ける
  * 送信ボタンを input:submit からbuttonタグに切り替える
*/ ?>
  <?php echo $this->BcForm->submit(__d('baser', '保存'), array(
  'div' => false,
  'type' => 'submit',
  'class' => 'button bca-btn',
  'data-bca-btn-type' => 'save',
  'data-bca-btn-size' => 'xl',
  'id' => 'BtnSave'
  )) ?>
</div>

<?php echo $this->BcForm->end() ?>