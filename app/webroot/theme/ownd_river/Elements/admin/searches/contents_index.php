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
 * コンテンツ一覧
 */
?>


<?php echo $this->BcForm->create('Content', ['url' => ['action' => 'index']]) ?>
<?php echo $this->BcForm->hidden('Content.open', ['value' => true]) ?>
<p class="bca-search__input-list">
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('Content.folder_id', 'フォルダ') ?>
		<?php echo $this->BcForm->input('Content.folder_id', ['type' => 'select', 'class' => 'bca-select', 'options' => $folders, 'empty' => '指定なし', 'escape' => false]) ?>
	</span>
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('Content.name', '名称') ?>
		<?php echo $this->BcForm->input('Content.name', ['type' => 'text', 'size' => 20]) ?>
	</span>
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('Content.type', 'タイプ') ?>
		<?php echo $this->BcForm->input('Content.type', ['type' => 'select', 'class' => 'bca-select', 'options' => $contentTypes, 'empty' => '指定なし']) ?>
	</span>
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('Content.self_status', '公開状態') ?>
		<?php echo $this->BcForm->input('Content.self_status', ['type' => 'select', 'class' => 'bca-select', 'options' => $this->BcText->booleanMarkList(), 'empty' => '指定なし']) ?>
	</span>
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('Content.author_id', '作成者') ?>
		<?php echo $this->BcForm->input('Content.author_id', ['type' => 'select', 'class' => 'bca-select', 'options' => $authors, 'empty' => '指定なし']) ?>
	</span>
</p>
<div class="button bca-search__btns">
	<div class="bca-search__btns-item"><?php $this->BcBaser->link('検索', "javascript:void(0)", array('id' => 'BtnSearchSubmit', 'class' => 'bca-btn', 'data-bca-btn-type' => 'search')) ?></div>
	<div class="bca-search__btns-item"><?php $this->BcBaser->link('クリア', "javascript:void(0)", array('id' => 'BtnSearchClear', 'class' => 'bca-btn', 'data-bca-btn-type' => 'clear')) ?></div>
</div>
<?php $this->BcForm->end() ?>
