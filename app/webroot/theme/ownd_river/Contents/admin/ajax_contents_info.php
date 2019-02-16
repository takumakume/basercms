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
?>


<?php if($sites): ?>
<div class="bca-contents-info">
<?php foreach($sites as $site): ?>
<h3 class="bca-contents-info__title"><?php echo $site['Site']['display_name'] ?></h3>
<ul class="bca-contents-info__list" style="margin-bottom:15px;">
	<li class="bca-contents-info__list-item"><?php echo __d('baser', '公開中') ?>： <?php echo $site['published'] ?> <?php echo __d('baser', 'ページ') ?><br />
		<?php echo __d('baser', '非公開') ?>： <?php echo $site['unpublished'] ?> <?php echo __d('baser', 'ページ') ?><br />
		<?php echo __d('baser', '合　計') ?>： <?php echo $site['total'] ?> <?php echo __d('baser', 'ページ') ?>
	</li>
</ul>
<?php endforeach ?>
</div>
<?php endif ?>
