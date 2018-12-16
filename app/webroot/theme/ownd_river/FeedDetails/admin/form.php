<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Feed.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] フィード詳細 フォーム
 */
?>

<?php if ($this->action == 'admin_add'): ?>
	<?php echo $this->BcForm->create('FeedDetail', array('url' => array('controller' => 'feed_details', 'action' => 'add', $this->BcForm->value('FeedDetail.feed_config_id')))) ?>
	<?php elseif ($this->action == 'admin_edit'): ?>
	<?php echo $this->BcForm->create('FeedDetail', array('url' => array('controller' => 'feed_details', 'action' => 'edit', $this->BcForm->value('FeedDetail.feed_config_id'), $this->BcForm->value('FeedDetail.id'), 'id' => false))) ?>
<?php endif; ?>

<?php echo $this->BcForm->input('FeedDetail.feed_config_id', array('type' => 'hidden')) ?>

<section class="bca-section" data-bca-section-type='form-group'>
	<h2 class="bca-main__heading" data-bca-heading-size="lg">基本項目</h2>

	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<?php if ($this->action == 'admin_edit'): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedDetail.id', 'ID') ?>&nbsp;<span class="required bca-label" data-bca-label-type="required"><?php echo __d('baser', '必須') ?></span></th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->value('FeedDetail.id') ?>
					<?php echo $this->BcForm->input('FeedDetail.id', array('type' => 'hidden')) ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedDetail.name', __d('baser', 'フィード詳細名')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required"><?php echo __d('baser', '必須') ?></span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedDetail.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'autofocus' => true)) ?>
				<?php echo $this->BcForm->error('FeedDetail.name') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedDetail.url', __d('baser', 'フィードURL')) ?>&nbsp;<span class="required bca-label" data-bca-label-type="required"><?php echo __d('baser', '必須') ?></span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedDetail.url', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
				<?php echo $this->BcForm->error('FeedDetail.url') ?>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</section>

<section class="bca-section" data-bca-section-type='form-group'>
	<h2 class="btn-slide-form"><a href="javascript:void(0)" id="FormOption" class="bca-btn">オプション</a></h2>
	<table cellpadding="0" cellspacing="0" class="form-table bca-form-table slide-body" id="FormOptionBody">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedDetail.cache_time', __d('baser', 'キャッシュ時間')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input('FeedDetail.cache_time', array(
					'type' => 'select',
					'options' => $this->BcForm->getControlSource('cache_time'),
					'empty' => __d('baser', 'なし')))
				?>
<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpCacheTime', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('FeedDetail.cache_time') ?>
				<div id="helptextCacheTime" class="helptext"> 負荷を軽減させる為、フィード情報をキャッシュさせる時間を選択してください。</div>
			</td>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('FeedDetail.category_filter', __d('baser', 'カテゴリフィルター')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('FeedDetail.category_filter', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpCategoryFilter', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
<?php echo $this->BcForm->error('FeedDetail.category_filter') ?>
				<div id="helptextCategoryFilter" class="helptext">
					<ul>
						<li>特定のカテゴリのみ絞込みたい場合は、カテゴリ名を入力してください。</li>
						<li>複数のカテゴリを指定する場合は、カテゴリ名を|（半角縦棒）で区切ります。</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm('option') ?>
	</table>
</section>

  <!-- button -->
	<div class="bca-actions">
  	<?php if ($this->action == 'admin_edit' || $this->action == 'admin_add'): ?>
    <div class="bca-actions__main">
  		<?php echo $this->BcForm->button(__d('baser', '保存'),
        array(
          'type' => 'submit',
          'id' => 'BtnSave',
          'div' => false,
          'class' => 'button bca-btn bca-actions__item',
          'data-bca-btn-type' => 'save',
          'data-bca-btn-size' => 'xl'
        )) ?>
    </div>
    <?php endif ?>
    <?php if ($this->action == 'admin_edit'): ?>
    <div class="bca-actions__sub">
      <?php $this->BcBaser->link(__d('baser', '削除'), array('action' => 'delete', $this->BcForm->value('FeedConfig.id'), $this->BcForm->value('FeedDetail.id')),
        array(
          'class' => 'submit-token button bca-btn bca-actions__item',
          'data-bca-btn-type' => 'delete',
          'data-bca-btn-size' => 'sm',
          'data-bca-btn-color' => 'danger'
        ), 
        sprintf(__d('baser', '%s を本当に削除してもいいですか？'), $this->BcForm->value('FeedDetail.name')
        ), 
        false
        ); 
        ?>
    </div>
    <?php endif ?>
	</div>




<?php echo $this->BcForm->end() ?>
