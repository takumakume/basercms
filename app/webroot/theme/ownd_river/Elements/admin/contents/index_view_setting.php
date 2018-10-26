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
if($this->action == 'admin_index') {
	echo $this->BcForm->hidden('ViewSetting.mode', array('value' => 'index'));
} elseif($this->action = 'admin_trash_index') {
	echo $this->BcForm->hidden('ViewSetting.mode', array('value' => 'trash'));
}
?>


<?php if($this->action == 'admin_index'): ?>
<div class="panel-box bca-panel-box" id="ViewSetting">
    <div class="bca-panel-box__inline-fields">
        <?php if(count($sites) >= 2): ?>
            <div class="bca-panel-box__inline-fields-item">
                <label class="bca-panel-box__inline-fields-title"><?php echo __d('baser', 'サイト') ?></label>
                <?php echo $this->BcForm->input('ViewSetting.site_id', array('type' => 'select', 'options' => $sites)) ?>
            </div>
            <div class="bca-panel-box__inline-fields-separator"></div>
        <?php else : ?>
            <?php echo $this->BcForm->input('ViewSetting.site_id', array('type' => 'hidden', 'options' => $sites)) ?>
        <?php endif ?>
        <div class="bca-panel-box__inline-fields-item">
            <label class="bca-panel-box__inline-fields-title"><?php echo __d('baser', '表示') ?></label>
            <?php echo $this->BcForm->input('ViewSetting.list_type', array('type' => 'radio', 'options' => $listTypes)) ?>
        </div>
    </div>
</div>
<?php endif ?>