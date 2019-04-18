<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * コンテンツ情報
 * @var string $mainSiteDisplayName メインサイト表示名称
 */
?>


<?php if($this->request->action == 'admin_edit' || $this->request->action == 'admin_edit_alias'): ?>
<section id="EtcSetting" class="bca-section" data-bca-section-type="form-group">
	<h3 class="bca-main__heading" data-bca-heading-size="lg">その他情報</h3>
	<div class="bca-box">
    <ul class="bca-list" data-bca-list-layout="horizon" data-bca-list-type='circle'>
      <li class="bca-list__item"><span>コンテンツID</span>：<?php echo $this->request->data['Content']['id'] ?></li>
      <li class="bca-list__item"><span>実体ID</span>：<?php echo $this->request->data['Content']['entity_id'] ?></li>
      <li class="bca-list__item"><span>プラグイン</span>：<?php echo $this->request->data['Content']['plugin'] ?></li>
      <li class="bca-list__item"><span>コンテンツタイプ</span>：<?php echo $this->request->data['Content']['type'] ?></li>
      <li class="bca-list__item"><span>データ作成日</span>：<?php echo $this->BcTime->format('Y/m/d H:i:s', $this->request->data['Content']['created']) ?></li>
      <li class="bca-list__item"><span>データ更新日</span>：<?php echo $this->BcTime->format('Y/m/d H:i:s', $this->request->data['Content']['modified']) ?></li>
      <li class="bca-list__item">サイト：<?php echo $this->BcText->noValue($this->request->data['Site']['display_name'], $mainSiteDisplayName) ?></li>
      <li class="bca-list__item">タイプ：
      <?php if(!$this->BcForm->value('Content.alias_id')): ?>
        <?php if(!empty($this->BcContents->settings[$this->BcForm->value('Content.type')])): ?>
          <?php echo $this->BcContents->settings[$this->BcForm->value('Content.type')]['title'] ?>
        <?php else: ?>
          デフォルト
        <?php endif ?>
      <?php else: ?>
        エイリアス
      <?php endif ?>
      <?php if(empty($this->BcContents->settings[$this->BcForm->value('Content.type')])): ?>
        <p class="bca-notice">タイプ「デフォルト」は、プラグインの無効処理等が理由となり、タイプとの関連付けが外れてしまっている状態です。<br>プラグインがまだ存在する場合は有効にしてください。</p>
      <?php endif ?>
      </li>
    </ul>
	</div>
</section>
<?php endif ?>
