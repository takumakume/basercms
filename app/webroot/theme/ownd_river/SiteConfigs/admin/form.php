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
 * [管理画面] サイト設定 フォーム
 *
 * @var array $themes
 */
$this->BcBaser->js('admin/site_configs/form', false, array('id' => 'AdminSiteConfigsFormScript',
	'data-safeModeOn' => (string) $safeModeOn
));
?>

<section class="bca-section" data-bca-section-type='form-group'>
<h2 class="bca-main__heading" data-bca-heading-size="lg">基本項目</h2>
<?php echo $this->BcForm->create('SiteConfig', ['url' => ['action' => 'form']]) ?>
<?php echo $this->BcForm->hidden('SiteConfig.id') ?>

  <table cellpadding="0" cellspacing="0" class="form-table bca-form-table section" data-bca-table-type="type2">
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.formal_name', __d('baser', 'WEBサイト名')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.formal_name', array('type' => 'text', 'size' => 55, 'maxlength' => 255, 'autofocus' => true)) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <?php echo $this->BcForm->error('SiteConfig.formal_name') ?>
        <div id="helptextFormalName" class="helptext">
          <ul>
            <li>正式なWEBサイト名を指定します。</li>
            <li>メールの送信元等で利用します。</li>
          </ul>
        </div>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.name', __d('baser', 'WEBサイトタイトル')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.name', array('type' => 'text', 'size' => 55, 'maxlength' => 255, 'counter' => true)) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <?php echo $this->BcForm->error('SiteConfig.name') ?>
        <div id="helptextName" class="helptext">
          <ul>
            <li>Webサイトの基本タイトルとして利用されます。（タイトルタグに影響します）</li>
            <li>テンプレートで利用する場合は、<br />
              &lt;?php $this->BcBaser->title() ?&gt; で出力します。</li>
          </ul>
        </div>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.keyword', __d('baser', 'サイト基本キーワード')) ?></th>
      <td class="col-input bca-form-table__input"><?php echo $this->BcForm->input('SiteConfig.keyword', array('type' => 'text', 'size' => 55, 'maxlength' => 255, 'counter' => true)) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <?php echo $this->BcForm->error('SiteConfig.keyword') ?>
        <div id="helptextKeyword" class="helptext">テンプレートで利用する場合は、<br />
          &lt;?php $this->BcBaser->keywords() ?&gt; で出力します。</div>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.description', __d('baser', 'サイト基本説明文')) ?></th>
      <td class="col-input bca-form-table__input"><?php echo $this->BcForm->input('SiteConfig.description', array('type' => 'textarea', 'cols' => 36, 'rows' => 5, 'counter' => true, 'data-input-text-size' => 'full-counter')) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <?php echo $this->BcForm->error('SiteConfig.description') ?>
        <div id="helptextDescription" class="helptext">テンプレートで利用する場合は、<br />
          &lt;?php $this->BcBaser->description() ?&gt; で出力します。</div>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.email', __d('baser', '管理者メールアドレス')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.email', array('type' => 'text', 'size' => 35, 'maxlength' => 255)) ?>
        <?php echo $this->BcForm->error('SiteConfig.email') ?>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.site_url', __d('baser', 'WebサイトURL')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.site_url', array_merge(array('type' => 'text', 'size' => 35, 'maxlength' => 255,'data-margin'=>'bottom'), $disableSettingInstallSetting)) ?><br />
        <?php echo $this->BcForm->input('SiteConfig.ssl_url', array_merge(array('type' => 'text', 'size' => 35, 'maxlength' => 255, 'after' => ' <small>[SSL]</small>'), $disableSettingInstallSetting)) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <?php if ($disableSettingInstallSetting): ?>
          <?php echo $this->BcForm->input('SiteConfig.site_url', array('type' => 'hidden')) ?>
        <?php endif ?>
        <?php echo $this->BcForm->error('SiteConfig.site_url') ?>
        <?php echo $this->BcForm->error('SiteConfig.ssl_url') ?>
        <div id="helptextSiteUrl" class="helptext">baserCMSを設置しているURLを指定します。管理画面等でSSL通信を利用する場合は、SSL通信で利用するURLも指定します。</div>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.maintenance', __d('baser', '公開状態')) ?></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.maintenance', array('type' => 'select', 'options' => array(0 => __d('baser', '公開中'), 1 => __d('baser', 'メンテナンス中')))) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <div id="helptextMaintenance" class="helptext">
          公開状態を指定します。<br />
          メンテナンス中の場合に、公開ページを確認するには、管理画面にログインする必要があります。
          ただし、制作・開発モードがデバッグモードに設定されている場合は、メンテナンス中にしていても公開ページが表示されてしまいますので注意が必要です。
        </div>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.mode', __d('baser', '制作・開発モード')) ?></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.mode', array_merge(array('type' => 'select', 'options' => $this->BcForm->getControlSource('mode')), $disableSettingInstallSetting)) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <div id="helptextDebug" class="helptext">制作・開発時のモードを指定します。通常は、ノーマルモードを指定しておきます。<br />
          ※ CakePHPのデバッグモードを指します。<br />
          ※ インストールモードはbaserCMSを初期化する場合にしか利用しませんので普段は利用しないようにしてください。</div>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.widget_area', __d('baser', '標準ウィジェットエリア')) ?></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.widget_area', array('type' => 'select', 'options' => $this->BcForm->getControlSource('WidgetArea.id'), 'empty' => __d('baser', 'なし'))) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <div id="helptextWidgetArea" class="helptext">
          公開ページ全般で利用するウィジェットエリアを指定します。<br />
          ウィジェットエリアは「<?php $this->BcBaser->link(__d('baser', 'ウィジェットエリア管理'), array('controller' => 'widget_areas', 'action' => 'index')) ?>」より追加できます。
        </div>
      </td>
    </tr>
  </table>
</section>
<section class="bca-section" data-bca-section-type='form-group'>
  <div class="bca-collapse__action">
    <button type="button" class="bca-collapse__btn" data-bca-collapse="collapse" data-bca-target="#formAdminSettingBody" aria-expanded="false" aria-controls="formOptionBody">管理画面設定&nbsp;&nbsp;<i class="bca-icon--chevron-down bca-collapse__btn-icon"></i></button>
  </div>
  <div class="bca-collapse" id="formAdminSettingBody" data-bca-state="">
	  <table cellpadding="0" cellspacing="0" class="form-table bca-form-table section" data-bca-table-type="type2">
		<tr>
		  <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.admin_ssl', __d('baser', '管理画面SSL設定')) ?></th>
		  <td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('SiteConfig.admin_ssl', array_merge(array('type' => 'radio', 'options' => $this->BcText->booleanDoList(__d('baser', 'SSL通信を利用')), 'separator' => '　', 'legend' => false), $disableSettingInstallSetting)) ?>
			<i class="bca-icon--question-circle btn help bca-help"></i>
			<?php echo $this->BcForm->error('SiteConfig.admin_ssl') ?>
			<div id="helptextAdminSslOn" class="helptext">管理者ページでSSLを利用する場合は、事前にSSLの申込、設定が必要です。<br />
			  また、SSL用のWebサイトURLの指定が必要です。</div>
		  </td>
		</tr>
		<tr>
		  <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.admin_list_num', __d('baser', '管理画面テーマ')) ?></th>
		  <td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('SiteConfig.admin_theme', ['type' => 'select', 'options' => $themes]) ?>
			<?php echo $this->BcForm->error('SiteConfig.admin_theme') ?>
		  </td>
		</tr>
		<tr>
		  <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.admin_list_num', __d('baser', '初期一覧件数')) ?></th>
		  <td class="col-input bca-form-table__input">
			<?php
			echo $this->BcForm->input('SiteConfig.admin_list_num', array('type' => 'select', 'options' => array(
				10 => __d('baser', '10件'),
				20 => __d('baser', '20件'),
				50 => __d('baser', '50件'),
				100 => __d('baser', '100件')
			)))
			?>
			<?php echo $this->BcForm->error('SiteConfig.admin_list_num') ?>
			<i class="bca-icon--question-circle btn help bca-help"></i>
			<div id="helptextAdminListNum" class="helptext">ダッシュボードに表示される「最近の動き」などの表示件数を設定します</div>
		  </td>
		</tr>
		<tr>
		  <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.login_credit', __d('baser', 'ログインページのクレジット表示')) ?></th>
		  <td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('SiteConfig.login_credit', array('type' => 'radio', 'options' => $this->BcText->booleanDoList(__d('baser', '利用')))) ?>
			<i class="bca-icon--question-circle btn help bca-help"></i>
			<div class="helptext">ログインページに表示されているクレジット表示を利用するかどうか設定します。</div>
			<?php echo $this->BcForm->error('SiteConfig.login_credit') ?>
		  </td>
		</tr>
		<tr>
		  <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.admin_side_banner', __d('baser', 'サイドバーのバナー表示')) ?></th>
		  <td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('SiteConfig.admin_side_banner', array('type' => 'radio', 'options' => $this->BcText->booleanDoList(__d('baser', '利用')))) ?>
			<i class="bca-icon--question-circle btn help bca-help"></i>
			<div class="helptext">管理システムのサイド部分にバナーを表示するかどうか設定します。</div>
			<?php echo $this->BcForm->error('SiteConfig.admin_side_banner') ?>
		  </td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	  </table>
  </div>
</section>

<section class="bca-section" data-bca-section-type='form-group'>
  <div class="bca-collapse__action">
    <button type="button" class="bca-collapse__btn" data-bca-collapse="collapse" data-bca-target="#formOuterServiceSettingBody" aria-expanded="false" aria-controls="formOptionBody">外部サービス設定&nbsp;&nbsp;<i class="bca-icon--chevron-down bca-collapse__btn-icon"></i></button>
  </div>
  <div class="bca-collapse" id="formOuterServiceSettingBody" data-bca-state="">
	<table cellpadding="0" cellspacing="0" class="form-table bca-form-table"data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.address', __d('baser', 'GoogleMaps住所')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('SiteConfig.address', array('type' => 'text', 'size' => 35, 'maxlength' => 255, 'placeholder' => __d('baser', '住所'),'data-margin'=>'bottom')) ?>
				<i class="bca-icon--question-circle btn help bca-help"></i>
				<div id="helptextAddress" class="helptext">GoogleMapを利用する場合は地図を表示させたい住所を入力してください。郵便番号からでも大丈夫です。<br>
					<br>
					入力例1) 福岡市中央区大名2-11-25<br>
					入力例2) 〒819-0041 福岡県福岡市中央区大名2-11-25<br>
					<br>
					建物名を含めるとうまく表示されない場合があります。<br>
					その時は建物名を省略して試してください。<br>APIキーを入力しないと地図が表示されない場合があります。<a href="https://developers.google.com/maps/web/" target="_blank">「ウェブ向け Google Maps API」</a></div>
				<br />
				<?php echo $this->BcForm->input('SiteConfig.google_maps_api_key', array('type' => 'text', 'size' => 35, 'maxlength' => 255, 'placeholder' => __d('baser', 'APIキー'))) ?>
				<?php echo $this->BcForm->error('SiteConfig.address') ?>
				<?php echo $this->BcForm->error('SiteConfig.google_maps_api_key') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.google_analytics_id', __d('baser', 'Google Analytics<br />トラッキングID')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('SiteConfig.google_analytics_id', array('type' => 'text', 'size' => 35, 'maxlength' => 16,'data-margin'=>'bottom')) ?>
				<i class="bca-icon--question-circle btn help bca-help"></i>
				<div id="helptextGoogleAnalyticsId" class="helptext">
					Googleの無料のアクセス解析サービス <a href="http://www.google.com/intl/ja/analytics/" target="_blank">Google Analytics</a> を利用される方は、取得したトラッキングID (UA-000000-01 のような文字列）を入力してください。<br />
					※事前に<a href="http://www.google.com/intl/ja/analytics/" target="_blank">Google Analytics</a> で登録作業が必要です。<br />
					テンプレートで利用する場合は、 <pre>&lt;?php $this->BcBaser->googleAnalytics() ?&gt;</pre> で出力します。
				</div>
				<?php echo $this->BcForm->error('SiteConfig.google_analytics_id') ?><br />
				ユニバーサルアナリティクスを <?php echo $this->BcForm->input('SiteConfig.use_universal_analytics', array('type' => 'radio', 'options' => array('0' => __d('baser', '利用していない'), '1' => __d('baser', '利用している')))) ?>
			</td>
		</tr>
  </table>
  </div>
</section>

<section class="bca-section" data-bca-section-type='form-group'>
  <div class="bca-collapse__action">
    <button type="button" class="bca-collapse__btn" data-bca-collapse="collapse" data-bca-target="#formSubSiteSettingBody" aria-expanded="false" aria-controls="formOptionBody">サブサイト設定&nbsp;&nbsp;<i class="bca-icon--chevron-down bca-collapse__btn-icon"></i></button>
  </div>
  <div class="bca-collapse" id="formSubSiteSettingBody" data-bca-state="">
  <table cellpadding="0" cellspacing="0" class="form-table bca-form-table section" data-bca-table-type="type2">
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.main_site_display_name', __d('baser', 'メインサイト表示名称')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required">必須</span></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.main_site_display_name', array('type' => 'text', 'size' => 35, 'maxlength' => 255)) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <div class="helptext">サブサイトを利用する際に、メインサイトを特定する識別名称を設定します。</div>
        <?php echo $this->BcForm->error('SiteConfig.main_site_display_name') ?>
      </td>
    </tr>
    <tr>
      <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.use_site_device_setting', __d('baser', 'デバイス・言語設定')) ?></th>
      <td class="col-input bca-form-table__input">
        <?php echo $this->BcForm->input('SiteConfig.use_site_device_setting', ['type' => 'checkbox', 'label' => __d('baser', 'サブサイトでデバイス設定を利用する')]) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <div class="helptext">サブサイトにデバイス属性を持たせ、サイトアクセス時、ユーザーエージェントを判定し適切なサイトを表示する機能を利用します。</div>
        <br>
        <?php echo $this->BcForm->input('SiteConfig.use_site_lang_setting', ['type' => 'checkbox', 'label' => __d('baser', 'サブサイトで言語設定を利用する')]) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <div class="helptext">サブサイトに言語属性を持たせ、サイトアクセス時、ブラウザの言語設定を判定し適切なサイトを表示する機能を利用します。</div>
        <?php echo $this->BcForm->error('SiteConfig.use_site_device_setting') ?>
        <?php echo $this->BcForm->error('SiteConfig.use_site_lang_setting') ?>
      </td>
    </tr>
  </table>
  </div>
</section>
<section class="bca-section" data-bca-section-type='form-group'>
 <div class="bca-collapse__action">
    <button type="button" class="bca-collapse__btn" data-bca-collapse="collapse" data-bca-target="#formEditorSettingBody" aria-expanded="false" aria-controls="formOptionBody">エディタ設定&nbsp;&nbsp;<i class="bca-icon--chevron-down bca-collapse__btn-icon"></i></button>
  </div>
  <div class="bca-collapse" id="formEditorSettingBody" data-bca-state="">
  <table cellpadding="0" cellspacing="0" class="form-table bca-form-table section" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.editor_enter_br', __d('baser', 'エディタタイプ')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('SiteConfig.editor', array('type' => 'radio', 'options' => Configure::read('BcApp.editors'))) ?>
			</td>
		</tr>
		<tr class="ckeditor-option">
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.editor_enter_br', __d('baser', '改行モード')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input('SiteConfig.editor_enter_br', array('type' => 'radio', 'options' => array(
						'0' => __d('baser', '改行時に段落を挿入する'),
						'1' => __d('baser', '改行時にBRタグを挿入する')
				)))
				?>
			</td>
		</tr>
		<tr class="ckeditor-option">
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.editor_styles', __d('baser', 'エディタスタイルセット')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('SiteConfig.editor_styles', array('type' => 'textarea', 'cols' => 36, 'rows' => 10,'data-input-text-size' => 'full-counter')) ?>
        <i class="bca-icon--question-circle btn help bca-help"></i>
        <?php echo $this->BcForm->error('SiteConfig.editor_styles') ?>
				<div id="helptextFormalName" class="helptext">
					<p>固定ページなどで利用するエディタのスタイルセットをCSS形式で記述する事ができます。</p>
					<pre>
# タイトル
タグ {
	プロパティ名：プロパティ値
}

 《記述例》
 # 見出し
 h2 {
	font-size:20px;
	color:#333;
 }
					</pre>
					<p>タグにプロパティを設定しない場合は次のように記述します。</p>
					<pre>
# 見出し
h2 {}
					</pre>
				</div>
			</td>
		</tr>
  </table>
  </div>
</section>
<section class="bca-section" data-bca-section-type='form-group'>
 <div class="bca-collapse__action">
    <button type="button" class="bca-collapse__btn" data-bca-collapse="collapse" data-bca-target="#formMailSettingBody" aria-expanded="false" aria-controls="formOptionBody">メール設定&nbsp;&nbsp;<i class="bca-icon--chevron-down bca-collapse__btn-icon"></i></button>
  </div>
  <div class="bca-collapse" id="formMailSettingBody" data-bca-state="">
	<table cellpadding="0" cellspacing="0" class="form-table bca-form-table" data-bca-table-type="type2">
		<tr>
			<th class="bca-form-table__label"><?php echo $this->BcForm->label('SiteConfig.mail_encode', __d('baser', 'メール送信文字コード')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('SiteConfig.mail_encode', array('type' => 'select', 'options' => Configure::read('BcEncode.mail'))) ?>
				<i class="bca-icon--question-circle btn help bca-help"></i>
				<div id="helptextEncode" class="helptext">送信メールの文字コードを選択します。<br />受信したメールが文字化けする場合に変更します。</div>
				<?php echo $this->BcForm->error('SiteConfig.mail_encode') ?>
			</td>
		</tr>
		<tr>
			<th class="bca-form-table__label">
        <?php echo $this->BcForm->label('SiteConfig.smtp_host', __d('baser', 'SMTP設定')) ?></th>
			<td class="col-input bca-form-table__input">
        <table class="bca-form-table__inner-table">
          <tr>
            <th class="bca-form-table__inner-table-label">
              <?php echo $this->BcForm->label('SiteConfig.smtp_host', __d('baser', 'ホスト')) ?>
            </th>
            <td class="bca-form-table__inner-table-input">
              <?php echo $this->BcForm->input('SiteConfig.smtp_host', array('type' => 'text', 'size' => 35, 'maxlength' => 255, 'autocomplete' => 'off')) ?>
              <?php echo $this->BcForm->error('SiteConfig.smtp_host') ?>
              <i class="bca-icon--question-circle btn help bca-help"></i>
              <div id="helptextSmtpHost" class="helptext">メールの送信にSMTPサーバーを利用する場合指定します。</div>
            </td>
          </tr>
          <tr class="bca-form-table__inner-table-label">
            <th class="bca-form-table__inner-table-label">
              <?php echo $this->BcForm->label('SiteConfig.smtp_port', __d('baser', 'ポート')) ?>
            </th>
            <td class="bca-form-table__inner-table-input">
              <?php echo $this->BcForm->input('SiteConfig.smtp_port', array('type' => 'text', 'size' => 35, 'maxlength' => 255, 'autocomplete' => 'off')) ?>
              <?php echo $this->BcForm->error('SiteConfig.smtp_port') ?>
              <i class="bca-icon--question-circle btn help bca-help"></i>
              <div class="helptext">メールの送信にSMTPサーバーを利用する場合指定します。入力を省略した場合、25番ポートを利用します。</div>
            </td>
          </tr>
          <tr>
            <th class="bca-form-table__inner-table-label">
              <?php echo $this->BcForm->label('SiteConfig.smtp_user', __d('baser', 'ユーザー')) ?>
            </th>
            <td class="bca-form-table__inner-table-input">
              <?php echo $this->BcForm->input('SiteConfig.smtp_user', array('type' => 'text', 'size' => 35, 'maxlength' => 255, 'autocomplete' => 'off')) ?>
              <?php echo $this->BcForm->error('SiteConfig.smtp_user') ?>
              <i class="bca-icon--question-circle btn help bca-help"></i>
              <div id="helptextSmtpUsername" class="helptext">メールの送信にSMTPサーバーを利用する場合指定します。</div>
            </td>
          </tr>
          <tr>
            <th class="bca-form-table__inner-table-label">
              <!-- ↓↓↓自動入力を防止する為のダミーフィールド↓↓↓ -->
              <input type="password" name="dummypass" style="display: none;">
              <?php echo $this->BcForm->label('SiteConfig.smtp_password', __d('baser', 'パスワード')) ?>
            </th>
            <td class="bca-form-table__inner-table-input">
              <?php echo $this->BcForm->input('SiteConfig.smtp_password', array('type' => 'password', 'size' => 35, 'maxlength' => 255, 'autocomplete' => 'off')) ?>
              <?php echo $this->BcForm->error('SiteConfig.smtp_password') ?>
              <i class="bca-icon--question-circle btn help bca-help"></i>
              <div id="helptextSmtpPassword" class="helptext">メールの送信にSMTPサーバーを利用する場合指定します。</div>
            </td>
          </tr>
          <tr>
            <th class="bca-form-table__inner-table-label">
              <?php echo $this->BcForm->label('SiteConfig.smtp_tls', __d('baser', 'TLS暗号化')) ?>
            </th>
            <td class="bca-form-table__inner-table-input">
              <?php echo $this->BcForm->input('SiteConfig.smtp_tls', array('type' => 'radio', 'options' => $this->BcText->booleanDoList(__d('baser', 'TLS暗号化を利用')))) ?>
              <?php echo $this->BcForm->error('SiteConfig.smtp_tls') ?>
              <i class="bca-icon--question-circle btn help bca-help"></i>
              <div id="helptextSmtpTls" class="helptext">SMTPサーバーがTLS暗号化を利用する場合指定します。</div>
            </td>
          </tr>
        </table>
				<div class="bca-form-table__inner-submit">
					<?php echo $this->BcForm->button(__d('baser', '<i class="bca-icon--mail"></i>メール送信テスト'), array('type' => 'button', 'class' => 'button-small bca-btn', 'id' => 'BtnCheckSendmail')) ?>　<span id=ResultCheckSendmail></span>
					<?php echo $this->BcBaser->img('admin/ajax-loader-s.gif', array('id' => 'AjaxLoaderCheckSendmail', 'style' => 'display:none')) ?>
				</div>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm('option') ?>

	</table>
	</div>
</section>
  <div class="bca-actions">
    <?php echo $this->BcForm->button(__d('baser', '保存'),
      array(
        'type' => 'submit',
        'id' => 'BtnSave',
        'div' => false,
        'class' => 'button bca-btn',
        'data-bca-btn-type' => 'save',
        'data-bca-btn-size' => 'lg',
        'data-bca-btn-width' => 'lg',
      )) ?>
  </div>

<?php echo $this->BcForm->end() ?>
