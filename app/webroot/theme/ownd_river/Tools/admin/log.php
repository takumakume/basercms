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


<div class="section bca-main__section">
	<h2 class="bca-main__heading" data-bca-heading-size="lg">ログ(エラーログ)の取得</h2>
	<p class="bca-main__text">ログ(エラーログ)をPCにダウンロードします。</p>
	<p class="bca-main__text"><?php $this->BcBaser->link(__d('baser', 'ダウンロード'), array('download'), array('class' => 'button-small bca-btn', 'data-bca-btn-type' =>'download')) ?> </p>
</div>

<div class="section bca-main__section">
	<h2 class="bca-main__heading" data-bca-heading-size="lg">エラーログの削除</h2>

	<p class="bca-main__text">エラーログを削除します。サーバの容量を圧迫する場合時などに利用ください。<br/>
	エラーログのサイズは、<?php echo number_format($fileSize) ?> bytesです。
	</p>
	<p class="bca-main__text"><?php $this->BcBaser->link(__d('baser', '削除'), array('delete'), array('class' => 'submit-token button-small bca-btn', 'data-bca-btn-type' =>'delete', 'confirm' => __d('baser', 'エラーログを削除します。いいですか？'))) ?> </p>
</div>