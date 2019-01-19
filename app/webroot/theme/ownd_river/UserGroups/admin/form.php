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
 * [ADMIN] ユーザーグループ登録/編集フォーム
 */
$authPrefixes = array();
foreach (Configure::read('BcAuthPrefix') as $key => $authPrefix) {
	$authPrefixes[$key] = $authPrefix['name'];
}
?>


<script type="text/javascript">
$(window).load(function() {
<?php if ($this->BcForm->value('UserGroup.name') == 'admins'): ?>
	$("#UserGroupAuthPrefixAdmin").prop('disabled', true);
<?php endif ?>
	$("#UserGroupAdminEditForm").submit(function(){
		$("#UserGroupAuthPrefixAdmin").removeAttr('disabled');
	});
});
</script>

<!-- form -->
<?php echo $this->BcForm->create('UserGroup') ?>
<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<?php if ($this->request->action == 'admin_edit'): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('UserGroup.id', 'NO') ?></th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->value('UserGroup.id') ?>
					<?php echo $this->BcForm->input('UserGroup.id', array('type' => 'hidden')) ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('UserGroup.name', __d('baser', 'ユーザーグループ名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php if ($this->BcForm->value('UserGroup.name') == 'admins' && $this->request->action == 'admin_edit'): ?>
					<?php echo $this->BcForm->value('UserGroup.name') ?>
					<?php echo $this->BcForm->input('UserGroup.name', array('type' => 'hidden')) ?>
				<?php else: ?>
					<?php echo $this->BcForm->text('UserGroup.name', array('size' => 20, 'maxlength' => 255, 'autofocus' => true)) ?>
				<?php endif ?>
				<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->BcForm->error('UserGroup.name') ?>
				<div id="helptextName" class="helptext">
					<ul>
						<li>重複しない識別名称を半角のみで入力してください。</li>
						<li>admins の場合は変更できません。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('UserGroup.title', __d('baser', '表示名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('UserGroup.title', array('type' => 'text', 'size' => 20, 'maxlength' => 255)) ?>
				<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpTitle', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<div id="helptextTitle" class="helptext">日本語が入力できますのでわかりやすい名称を入力します。</div>
				<?php echo $this->BcForm->error('UserGroup.title') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('UserGroup.use_admin_globalmenu', __d('baser', 'その他')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php if ($this->BcForm->value('UserGroup.name') == 'admins' && $this->request->action == 'admin_edit'): ?>
					<?php if ($this->BcForm->value('UserGroup.use_admin_globalmenu')): ?>
						管理システムのグローバルメニューを利用する
					<?php else: ?>
						管理システムのグローバルメニューを利用しない
					<?php endif ?>
				<?php else: ?>
					<span style="white-space: nowrap"><?php echo $this->BcForm->input('UserGroup.use_admin_globalmenu', array('type' => 'checkbox', 'label' => __d('baser', '管理システムのグローバルメニューを利用する'))) ?>　</span>
					<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
					<div id="helptextName" class="helptext">
						<ul>
							<li>管理システムでグローバルメニューを利用するかどうか設定します。</li>
							<li>管理グループの場合は変更できません。</li>
						</ul>
					</div>
					<?php echo $this->BcForm->error('UserGroup.use_admin_globalmenu') ?>
				<?php endif ?>
				<br>
				<span style="white-space: nowrap"><?php echo $this->BcForm->input('UserGroup.use_move_contents', array('type' => 'checkbox', 'label' => __d('baser', 'コンテンツのドラッグ＆ドロップ移動機能を利用する'))) ?></span>
				<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<div id="helptextName" class="helptext">
					<span>
						コンテンツ一覧のツリー構造において、ドラッグ＆ドロップでコンテンツの移動を許可するかどうかを設定します。
					</span>
				</div>
				<?php echo $this->BcForm->error('UserGroup.use_move_contents') ?>
			</td>
		</tr>
		<?php if (count($authPrefixes) > 1): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('UserGroup.auth_prefix', __d('baser', '認証プレフィックス設定')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->input('UserGroup.auth_prefix', array('type' => 'select', 'multiple' => 'checkbox', 'options' => $authPrefixes, 'value' => explode(',', $this->BcForm->value('UserGroup.auth_prefix')))) ?>
					<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpAuthPrefix', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
					<?php echo $this->BcForm->error('UserGroup.auth_prefix') ?>
					<div id="helptextAuthPrefix" class="helptext">
						認証プレフィックスの設定を指定します。<br />
						ユーザーグループ名が admins の場合は編集できません。
					</div>
				</td>
			</tr>
		<?php endif ?>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</div>
<div class="submit bc-align-center section bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'class' => 'bca-btn', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'xl', 'id' => 'BtnSave')) ?>
	</div>
	<?php if ($this->request->action == 'admin_edit'): ?>
		<div class="bca-actions__sub">
			<?php if ($this->BcForm->value('UserGroup.name') != 'admins'): ?>
				<?php $this->BcBaser->link(__d('baser', '削除'), array('action' => 'delete', $this->BcForm->value('UserGroup.id')), array('class' => 'submit-token button bca-btn bca-actions__item', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'sm'), sprintf(__d('baser', '%s を本当に削除してもいいですか？\n\n削除する場合、関連するユーザーは削除されませんが、関連するアクセス制限設定は全て削除されます。\n※ 関連するユーザーは管理者グループに所属する事になります。'), $this->BcForm->value('UserGroup.name')), false); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>

<?php echo $this->BcForm->end() ?>

<?php if ($this->request->action == 'admin_edit'): ?>
	<div class="section">
		<div class="panel-box bca-panel-box corner10">
			<h2>「よく使う項目」の初期データ</h2>
			<p>
				<small>このグループに新しいユーザーを登録した際、次の「よく使う項目」が登録されます。	</small>
			</p>
			<?php $favorites = BcUtil::unserialize($this->request->data['UserGroup']['default_favorites']) ?>
			<?php if ($favorites): ?>
			<ul class="bca-list" data-bca-list-layout="horizon">
				<?php foreach ($favorites as $favorite): ?>
					<li class="bca-list__item"><?php $this->BcBaser->link($favorite['name'], $favorite['url']) ?></li>
				<?php endforeach; ?>
			</ul>
			<?php endif ?>
		</div>
	</div>
<?php endif; ?>
