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
 * [ADMIN] スキーマ読み込み フォーム
 */
?>


<!-- form -->
<?php echo $this->BcForm->create('Tool', ['url' => ['action' => 'load_schema'], 'type' => 'file']) ?>

<table cellpadding="0" cellspacing="0" class="form-table bca-form-table">
	<tr>
		<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Tool.schema_type', __d('baser', 'スキーマタイプ')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
		<td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('Tool.schema_type', array(
				'type' => 'radio',
				'options' => array('create' => __d('baser', 'テーブル作成'), 'alter' => __d('baser', 'テーブル構造変更'), 'drop' => __d('baser', 'テーブル削除')),
				'legend' => false,
				'separator' => '　')); ?>
			<?php echo $this->BcForm->error('Tool.schema_type') ?>
		</td>
	</tr>
	<tr>
		<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Tool.schema_file', __d('baser', 'スキーマファイル')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
		<td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('Tool.schema_file', array('type' => 'file')) ?>
			<?php echo $this->BcForm->error('Tool.schema_file') ?>
		</td>
	</tr>
</table>

<div class="submit bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->submit(__d('baser', '読み込み'), array('div' => false, 'class' => 'btn-red button bca-btn', 'data-bca-btn-size' => 'lg')) ?>
	</div>
</div>

<?php echo $this->BcForm->end(); ?>
