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
 * [ADMIN] データメンテナンス
 */
?>


<div class="section bac-main__section">
	<h2 class="bca-main__heading" data-bca-heading-size="lg">データのバックアップ</h2>
	<p class="bca-main__text">データベースのデータをバックアップファイルとしてPCにダウンロードします。</p>
	<p class="bca-main__text"><?php $this->BcBaser->link(__d('baser', 'ダウンロード'), array('backup'), array('class' => 'button-small bca-btn', 'data-bca-btn-type' =>'download')) ?> </p>
</div>
	
<div class="section bac-main__section">
	<h2 class="bca-main__heading" data-bca-heading-size="lg">データの復元</h2>
	<p class="bca-main__text">バックアップファイルをアップロードし、データベースのデータを復元します。<br />
		<small>ダウンロードしたバックアップファイルをZIPファイルのままアップロードします。</small></p>
	<?php echo $this->BcForm->create('Tool', ['url' => ['action' => 'maintenance', 'restore'], 'type' => 'file']) ?>
	<p class="bca-main__text"><?php echo $this->BcForm->input('Tool.backup', array('type' => 'file')) ?>
	<?php echo $this->BcForm->error('Tool.backup') ?></p>
	<p class="bca-main__text"><?php echo $this->BcForm->submit(__d('baser', 'アップロード'), array('div' => false, 'class' => 'button-small bca-btn')) ?></p>
	<?php echo $this->BcForm->end() ?>
</div>
