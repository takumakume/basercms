<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Mail.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] メールコンテンツ フォーム
 */
$this->BcBaser->js('Mail.admin/mail_contents/edit', false);
?>


<h2 class="bca-main__heading" data-bca-heading-size="lg">基本項目</h2>

<?php echo $this->BcForm->create('MailContent', array('novalidate' => true)) ?>
<?php echo $this->BcForm->input('MailContent.id', array('type' => 'hidden')) ?>

<section class="bca-section bca-section__mail-description">
   <label for="MailContentDescriptionTmp" class="bca-form-table__label -label"><?php echo $this->BcForm->label('MailContent.description', __d('baser', 'メールフォーム説明文')) ?></label>
   <span class="bca-form-table__input-wrap">
		<?php
		echo $this->BcForm->ckeditor('MailContent.description', array(
			'editorWidth' => 'auto',
			'editorHeight' => '120px',
			'editorToolType' => 'simple',
			'editorEnterBr' => @$siteConfig['editor_enter_br']
		))
		?>
		<?php echo $this->BcForm->error('MailContent.description') ?>
   </span>
</section>

<div class="section">
  <table class="form-table bca-form-table" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.sender_1', __d('baser', '送信先メールアドレス')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input('MailContent.sender_1_', array(
					'type' => 'radio',
					'options' => array('0' => __d('baser', '管理者用メールアドレスに送信する'), '1' => __d('baser', '別のメールアドレスに送信する')),
					'legend' => false,
					'separator' => '<br />'))
				?><br />
<?php echo $this->BcForm->input('MailContent.sender_1', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'class'=>'bca-textbox__input bca-mailContentSender1', 'placeholder'=>'メールアドレスを入力してください')) ?>
				<?php echo $this->BcForm->error('MailContent.sender_1') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.sender_name', __d('baser', '送信先名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.sender_name', array('type' => 'text', 'size' => 80, 'maxlength' => 255)) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpSenderName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.sender_name') ?>
				<div id="helptextSenderName" class="helptext">自動返信メールの送信者に表示します。</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.subject_user', __d('baser', '自動返信メール件名<br />[ユーザー宛]')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.subject_user', array('type' => 'text', 'size' => 80)) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpSubjectUser', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.subject_user') ?>
				<div id="helptextSubjectUser" class="helptext">ユーザー宛の自動返信メールの件名に表示します。</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.subject_admin', __d('baser', '自動送信メール件名<br />[管理者宛]')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.subject_admin', array('type' => 'text', 'size' => 80)) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpSubjectAdmin', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.subject_admin') ?>
				<div id="helptextSubjectAdmin" class="helptext">管理者宛の自動送信メールの件名に表示します。</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.redirect_url', __d('baser', 'リダイレクトURL')) ?></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.redirect_url', array('type' => 'text', 'size' => 80, 'maxlength' => 255)) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpRedirectUrl', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.redirect_url') ?>
				<div id="helptextRedirectUrl" class="helptext">
					<ul>
						<li>メール送信後、別のURLにリダイレクトする場合、ここにURLを指定します。</li>
						<li>httpからの完全なURLを指定してください。</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>	
</div>


<div class="bca-section" data-bca-section-type='form-group'>
  <div class="bca-collapse__action">
    <button type="button" class="bca-collapse__btn" data-bca-collapse="collapse" data-bca-target="#formOptionBody" aria-expanded="false" aria-controls="formOptionBody">オプション <i class="bca-icon--desc bca-collapse__btn-icon"></i></button>
  </div>
  <div class="bca-collapse" id="formOptionBody" data-bca-state="">
    <table class="form-table bca-form-table" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.publish_begin', __d('baser', 'フォーム受付期間')) ?></th>
			<td class="col-input bca-form-table__input">
				&nbsp;&nbsp;
				<?php echo $this->BcForm->input('MailContent.publish_begin', [
				        'type' => 'dateTimePicker', 
                        'size' => 12, 
                        'maxlength' => 10,
						'dateLabel' => ['text' => '開始日付'],
						'timeLabel' => ['text' => '開始時間']
                ]) ?>
				&nbsp;〜&nbsp;
				<?php echo $this->BcForm->input('MailContent.publish_end', [
				        'type' => 'dateTimePicker', 
                        'size' => 12, 
                        'maxlength' => 10,
						'dateLabel' => ['text' => '終了日付'],
						'timeLabel' => ['text' => '終了時間']
                ]) ?>
				<?php echo $this->Html->image('admin/icn_help.png', array('class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<div class="helptext">
					<p>公開期間とは別にフォームの受付期間を設定する事ができます。受付期間外にはエラーではなく受付期間外のページを表示します。</p>
				</div>
				<?php echo $this->BcForm->error('MailContent.publish_begin') ?>
				<?php echo $this->BcForm->error('MailContent.publish_end') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.save_info', __d('baser', 'データベース保存')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailContent.save_info', array('type' => 'radio', 'options' => array(1 => __d('baser', '送信情報をデータベースに保存する'), 0 => __d('baser', '送信情報をデータベースに保存しない')))) ?>
				<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'saveInfo', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->BcForm->error('MailContent.save_info') ?>
				<div id="saveInfo" class="helptext">
					<ul>
						<li>メールフォームから送信された情報をデータベースに保存するかどうかを指定できます。</li>
						<li>メールフォームから送信された情報をデータベースに保存したくない場合は、保存しないを指定してください。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.auth_capthca', __d('baser', 'イメージ認証')) ?></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.auth_captcha', array('type' => 'checkbox', 'label' => __d('baser', '利用する'))) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpAuthCaptcha', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.auth_captcha') ?>
				<div id="helptextAuthCaptcha" class="helptext">
					<ul>
						<li>メールフォーム送信の際、表示された画像の文字入力させる事で認証を行ないます。</li>
						<li>スパムなどいたずら送信が多いが多い場合に設定すると便利です。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.ssl_on', __d('baser', 'SSL通信')) ?></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.ssl_on', array('type' => 'checkbox', 'label' => __d('baser', '利用する'))) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpSslOn', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.ssl_on', 'SSL通信を利用するには、' . $this->BcBaser->getLink('システム設定', array('controller' => 'site_configs', 'action' => 'form', 'plugin' => null), array('target' => '_blank')) . 'で、
						事前にSSL通信用のWebサイトURLを指定してください。', array('escape' => false))
?>
				<div id="helptextSslOn" class="helptext">
					管理者ページでSSLを利用する場合は、事前にSSLの申込、設定が必要です。また、SSL通信で利用するURLをシステム設定で指定している必要があります。
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.sender_2', __d('baser', 'BCC用送信先メールアドレス')) ?></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.sender_2', array('type' => 'text', 'size' => 80, 'maxlength' => 255)) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpSender2', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.sender_2') ?>
				<div id="helptextSender2" class="helptext">
					<ul><li>BCC（ブラインドカーボンコピー）用のメールアドレスを指定します。</li>
						<li>複数の送信先を指定するには、カンマで区切って入力します。</li></ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.widget_area', __d('baser', 'ウィジェットエリア')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
<?php echo $this->BcForm->input('MailContent.widget_area', array('type' => 'select', 'options' => $this->BcForm->getControlsource('WidgetArea.id'), 'empty' => __d('baser', 'サイト基本設定に従う'))) ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpWidgetArea', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.widget_area') ?>
				<div id="helptextWidgetArea" class="helptext">
					メールコンテンツで利用するウィジェットエリアを指定します。<br />
					ウィジェットエリアは「<?php $this->BcBaser->link('ウィジェットエリア管理', array('plugin' => null, 'controller' => 'widget_areas', 'action' => 'index')) ?>」より追加できます。
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.form_template', __d('baser', 'メールフォームテンプレート名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailContent.form_template', array('type' => 'select', 'options' => $this->Mail->getFormTemplates($this->BcForm->value('Content.site_id')))) ?>
				<?php echo $this->BcForm->input('MailContent.edit_mail_form', array('type' => 'hidden')) ?>
<?php if ($this->action == 'admin_edit'): ?>
	<?php $this->BcBaser->link('≫ 編集する', 'javascript:void(0)', array('id' => 'EditForm')) ?>
<?php endif ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpFormTemplate', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.form_template') ?>
				<div id="helptextFormTemplate" class="helptext">
					<ul>
						<li>メールフォーム本体のテンプレートを指定します。</li>
						<li>「編集する」からテンプレートの内容を編集する事ができます。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('MailContent.mail_template', __d('baser', '送信メールテンプレート名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailContent.mail_template', array('type' => 'select', 'options' => $this->Mail->getMailTemplates($this->BcForm->value('Content.site_id')))) ?>
				<?php echo $this->BcForm->input('MailContent.edit_mail', array('type' => 'hidden')) ?>
<?php if ($this->action == 'admin_edit'): ?>
	<?php $this->BcBaser->link('≫ 編集する', 'javascript:void(0)', array('id' => 'EditMail')) ?>
<?php endif ?>
<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpMailTemplate', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('MailContent.mail_template') ?>
				<div id="helptextMailTemplate" class="helptext">
					<ul>
						<li>送信するメールのテンプレートを指定します。</li>
						<li>「編集する」からテンプレートの内容を編集する事ができます。</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm('option') ?>
	</table>
  </div>
</div>

<!-- button -->
<div class="submit bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'id' => 'BtnSave',
      'data-bca-btn-type' => 'save',
      'data-bca-btn-size' => 'lg',
      'data-bca-btn-width' => 'lg',
    )) ?>
	</div>
</div>

<?php echo $this->BcForm->end() ?>