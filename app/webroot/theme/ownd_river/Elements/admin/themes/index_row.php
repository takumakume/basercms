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
 * [ADMIN] テーマ一覧　行
 */
?>


<li>
	<p class="theme-name"><strong><?php echo $data['title'] ?></strong>&nbsp;(&nbsp;<?php echo $data['name'] ?>&nbsp;)</p>
	<p class="bca-current-theme__screenshot">
		<a class="theme-popup" href="<?php echo '#Contents' . Inflector::camelize($data['name']) ?>">
			<?php if ($data['screenshot']): ?>
				<?php $this->BcBaser->img('/theme/' . $data['name'] . '/screenshot.png', array('alt' => $data['title'])) ?>
			<?php else: ?>
				<?php $this->BcBaser->img('admin/no-screenshot.png', array('alt' => $data['title'])) ?>
			<?php endif ?>
		</a>
	</p>
	<p class="row-tools">
		<?php if ($data['name'] != $this->BcBaser->siteConfig['theme']): ?>
			<?php $this->BcBaser->link('', array('action' => 'apply', $data['name']), array('title' => __d('baser', '適用'), 'class' => 'submit-token bca-btn-icon', 'data-bca-btn-type' => 'publish', 'data-bca-btn-size' => 'lg')) ?>
		<?php endif ?>
		<?php $this->BcBaser->link('', array('controller' => 'theme_files', 'action' => 'index', $data['name']), array('title' => __d('baser', 'テンプレート編集'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'file-list', 'data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'edit', $data['name']), array('title' => __d('baser', 'テーマ情報設定'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit', 'data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_copy', $data['name']), array('title' => __d('baser', 'テーマコピー'), 'class' => 'btn-copy bca-btn-icon', 'data-bca-btn-type' => 'copy', 'data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_delete', $data['name']), array('title' => __d('baser', 'テーマ削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'lg')) ?>
</p>
<p class="theme-version">バージョン：<?php echo $data['version'] ?></p>
<p class="theme-author">制作者：
	<?php if (!empty($data['url']) && !empty($data['author'])): ?>
		<?php $this->BcBaser->link($data['author'], $data['url'], array('target' => '_blank')) ?>
	<?php else: ?>
		<?php echo $data['author'] ?>
	<?php endif ?>
</p>
<div style='display:none'>
	<div id="<?php echo 'Contents' . Inflector::camelize($data['name']) ?>" class="theme-popup-contents clearfix">
		<div class="bca-current-theme__screenshot">
			<?php if ($data['screenshot']): ?>
				<?php $this->BcBaser->img('/theme/' . $data['name'] . '/screenshot.png', array('alt' => $data['title'])) ?>
			<?php else: ?>
				<?php $this->BcBaser->img('admin/no-screenshot.png', array('alt' => $data['title'])) ?>
			<?php endif ?>
		</div>
		<div class="theme-name"><strong><?php echo $data['title'] ?></strong>&nbsp;(&nbsp;<?php echo $data['name'] ?>&nbsp;)</div>
		<div class="theme-version">バージョン：<?php echo $data['version'] ?></div>
		<div class="theme-author">制作者：
			<?php if (!empty($data['url']) && !empty($data['author'])): ?>
				<?php $this->BcBaser->link($data['author'], $data['url'], array('target' => '_blank')) ?>
			<?php else: ?>
				<?php echo $data['author'] ?>
			<?php endif ?>
		</div>
		<div class="theme-description"><?php echo nl2br($data['description']) ?></div>
	</div>
</div>
</li>
