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
 * [EMAIL] パスワードのリセットメール
 */
?>

                                           <?php echo date('Y-m-d H:i:s') ?>　
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　　　　　　◆◇　<?php echo __d('baser', 'パスワードのリセット')?>　◇◆
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

　 <?php echo $email.  __d('baser', ' の新しいパスワードは、 '); ?>
　 <?php echo $password. __d('baser', ' です。'); ?>