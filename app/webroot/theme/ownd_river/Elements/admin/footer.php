<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 2.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] フッター
 */
?>
<div id="Footer" class="bca-footer" data-loggedin="<?php if(BcUtil::isAdminUser()): ?>true<?php else: ?>false<?php endif;?>">
<?php if(BcUtil::isAdminUser()): //ログイン後 ?>
	<div id="FooterInner" class="bca-footer__inner">
		<div id="FooterLogo">
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/logo_icon.svg', array('alt' => '')), array('controller' => 'dashboard', 'action' => 'index')) ?>

      <p id="BaserVersion">baserCMS <?php echo $baserVersion ?></p>
      <ul id="FooterBanner">
        <li><?php $this->BcBaser->link($this->BcBaser->getImg('baser.power.gif', array('alt' => 'baserCMS Power')), 'http://basercms.net/', array('target' => '_blank', 'title' => 'baserCMS Power')) ?></li>
        <li><?php $this->BcBaser->link($this->BcBaser->getImg('cake.power.gif', array('alt' => 'CakePHP Power')), 'http://cakephp.jp/', array('target' => '_blank', 'title' => 'CakePHP Power')) ?></li>
      </ul>

		</div>


    <ul>
      <li><a href="http://basercms.net/" target="_blank">baserCMS 公式サイト</a></li>
      <li><a href="http://sites.google.com/site/baserusers/" target="_blank">baserCMS ユーザー会</a></li>
      <li><a href="http://forum.basercms.net/" target="_blank">baserCMS ユーザーズフォーラム</a></li>
      <li><a href="http://project.e-catchup.jp/projects/basercms" target="_blank">baserCMS コア開発プロジェクト</a></li>
      <li><a href="http://www.facebook.com/basercms" target="_blank">baserCMS Facebook</a></li>
      <li><a href="http://twitter.com/basercms" target="_blank">baserCMS Twitter</a></li>
    </ul>



		<div>
			<p id="BaserVersion">baserCMS <?php echo $baserVersion ?></p>
			<div id="Copyright">Copyright (C) baserCMS Users Community <?php $this->BcBaser->copyYear(2009) ?> All rights reserved.</div>
		</div>

		<!-- / #FooterInner --></div>


<?php else: //未ログイン ?>
  <div class="bca-footer__inner">
    <div class="bca-footer__header">
      <?php $this->BcBaser->link($this->BcBaser->getImg('admin/logo_icon.svg', array('alt' => '', 'class'=>'bca-footer__logo')), array('controller' => 'dashboard', 'action' => 'index')) ?>

      <div class="bca-footer__baser-version">baserCMS <?php echo $baserVersion ?></div>

      <ul class="bca-footer__banner">
        <li class="bca-footer__banner__item"><?php $this->BcBaser->link($this->BcBaser->getImg('baser.power.gif', array('alt' => 'baserCMS Power')), 'http://basercms.net/', array('target' => '_blank', 'title' => 'baserCMS Power')) ?></li>
        <li class="bca-footer__banner__item"><?php $this->BcBaser->link($this->BcBaser->getImg('cake.power.gif', array('alt' => 'CakePHP Power')), 'http://cakephp.jp/', array('target' => '_blank', 'title' => 'CakePHP Power')) ?></li>
      </ul>
    </div>

    <ul class="bca-footer__sns-link">
      <li class="sns-link__item"><a href="http://www.facebook.com/basercms" target="_blank" class="sns-link__facebook">Facebook</a></li>
      <li class="sns-link__item"><a href="http://twitter.com/basercms" target="_blank" class="sns-link__twitter">Twitter</a></li>
    </ul>

    <ul class="bca-footer__links">
      <li><a href="http://basercms.net/" target="_blank">baserCMS 公式サイト</a></li>
      <li><a href="http://sites.google.com/site/baserusers/" target="_blank">baserCMS ユーザー会</a></li>
      <li><a href="http://forum.basercms.net/" target="_blank">baserCMS ユーザーズフォーラム</a></li>
      <li><a href="http://project.e-catchup.jp/projects/basercms" target="_blank">baserCMS コア開発プロジェクト</a></li>
    </ul>

    <div class="bca-copyright">Copyright (C) baserCMS Users Community <?php $this->BcBaser->copyYear(2009) ?> All rights reserved.</div>
  </div>
<?php endif; ?>
<!-- / #Footer --></div>