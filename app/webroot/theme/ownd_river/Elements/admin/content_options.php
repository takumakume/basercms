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
 * コンテンツオプション
 * @var bool $disableEditContent コンテンツ編集不可かどうか
 * @var array $authors 作成者リスト
 * @var array $layoutTemplates レイアウトテンプレートリスト
 */
?>

ooooo
<div id="OptionalSetting" class="bca-section">
  <h2 class="bca-main__heading" data-bca-heading-size="lg">オプション</h2>
	<table class="form-table bca-form-table" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.description', __d('baser', '説明文')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php if(!$disableEditContent): ?>
					<?php echo $this->BcForm->input('Content.description', array('type' => 'textarea', 'rows' => 2, 'placeholder' => $this->BcBaser->siteConfig['description'])) ?>　
				<?php else: ?>
					<?php if($this->BcForm->value('Content.exclude_search')): ?>
						<?php echo $this->BcForm->value('Content.description') ?>
					<?php else: ?>
						<?php echo $this->BcBaser->siteConfig['description'] ?>
					<?php endif ?>
					<?php echo $this->BcForm->hidden('Content.description') ?>
				<?php endif ?>
				<?php echo $this->BcForm->error('Content.description') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.eyecatch', __d('baser', 'アイキャッチ')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php if(!$disableEditContent): ?>
					<?php echo $this->BcForm->input('Content.eyecatch', ['type' => 'file', 'imgsize' => 'thumb']) ?>
				<?php else: ?>
					<?php echo $this->BcUpload->uploadImage('Content.eyecatch', $this->BcForm->value('Content.eyecatch'), ['imgsize' => 'thumb']) ?>
				<?php endif ?>
				<?php echo $this->BcForm->error('Content.eyecatch') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.author_id', __d('baser', '作成者')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php if(!$disableEditContent): ?>
					<?php echo $this->BcForm->input('Content.author_id', array('type' => 'select', 'options' => $authors)) ?>　
					<small>[作成日]</small> <?php echo $this->BcForm->input('Content.created_date', array('type' => 'dateTimePicker', 'size' => 12, 'maxlength' => 10)) ?>　
					<small>[更新日]</small> <?php echo $this->BcForm->input('Content.modified_date', array('type' => 'dateTimePicker', 'size' => 12, 'maxlength' => 10)) ?>
				<?php else: ?>
					<?php echo $this->BcText->arrayValue($this->BcForm->value('Content.author_id'), $authors) ?>　

					<small>[作成日]</small> <?php echo $this->BcTime->format('Y/m/d H:i', $this->BcForm->value('Content.created_date')) ?>　
					<small>[更新日]</small> <?php echo $this->BcTime->format('Y/m/d H:i', $this->BcForm->value('Content.modified_date')) ?>
					<?php echo $this->BcForm->hidden('Content.author_id') ?>
					<?php echo $this->BcForm->hidden('Content.created_date') ?>
					<?php echo $this->BcForm->hidden('Content.modified_date') ?>
				<?php endif ?>
				<?php echo $this->BcForm->error('Content.author_id') ?>
				<?php echo $this->BcForm->error('Content.created_date') ?>
				<?php echo $this->BcForm->error('Content.modified_date') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.layout_template', __d('baser', 'レイアウトテンプレート')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Content.layout_template', array('type' => 'select', 'options' => $layoutTemplates)) ?>　
				<?php echo $this->BcForm->error('Content.layout_template') ?>　
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.exclude_search', __d('baser', 'その他設定')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php if(!$disableEditContent): ?>
					<span style="white-space: nowrap"><?php echo $this->BcForm->input('Content.exclude_search', array('type' => 'checkbox', 'label' => __d('baser', 'サイト内検索の検索結果より除外する'))) ?></span>　
					<span style="white-space: nowrap"><?php echo $this->BcForm->input('Content.exclude_menu', array('type' => 'checkbox', 'label' => __d('baser', '公開ページのメニューより除外する'))) ?></span>　
					<span style="white-space: nowrap"><?php echo $this->BcForm->input('Content.blank_link', array('type' => 'checkbox', 'label' => __d('baser', 'メニューのリンクを別ウィンドウ開く'))) ?></span>
				<?php else: ?>
					<?php if($this->BcForm->value('Content.exclude_search')): ?>
						<span style="white-space: nowrap">サイト内検索の検索結果より除外する</span>　
					<?php else: ?>
						<span style="white-space: nowrap">サイト内検索の検索結果より除外しない</span>　
					<?php endif ?>
					<?php if($this->BcForm->value('Content.exclude_menu')): ?>
						<span style="white-space: nowrap">公開ページのメニューより除外する</span>　
					<?php else: ?>
						<span style="white-space: nowrap">公開ページのメニューより除外しない</span>　
					<?php endif ?>
					<?php if($this->BcForm->value('Content.blank_link')): ?>
						<span style="white-space: nowrap">メニューのリンクを別ウィンドウ開く</span>
					<?php else: ?>
						<span style="white-space: nowrap">メニューのリンクを同じウィンドウに開く</span>
					<?php endif ?>
					<?php echo $this->BcForm->hidden('Content.exclude_search') ?>
					<?php echo $this->BcForm->hidden('Content.exclude_menu') ?>
					<?php echo $this->BcForm->hidden('Content.blank_link') ?>
				<?php endif ?>
			</td>
		</tr>
	</table>
</div>
ppppp