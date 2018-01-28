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
 * サブサイト一覧（行）
 */
$classies = array();
if ($data['Site']['status']) {
	$classies = array('publish');
} else {
	$classies = array('unpublish', 'disablerow');
}
$class = ' class="' . implode(' ', $classies) . '"';
$url = $this->BcContents->getUrl('/' . $data['Site']['alias'] . '/', true, $data['Site']['use_subdomain']);
?>


<tr id="Row<?php echo $count ?>" <?php echo $class; ?>>
	<td class="row-tools bca-table-listup__tbody-td bca-table-listup__tbody-td--actions" style="width:15%">
		<?php $this->BcBaser->link('', array('action' => 'ajax_unpublish', $data['Site']['id']), array('title' => __d('baser', '非公開'), 'class' => 'btn-unpublish bca-btn-icon', 'data-bca-btn-type' => 'unpublish','data-bca-btn-size' => 'lg')) ?>
		<?php $this->BcBaser->link('', array('action' => 'ajax_publish', $data['Site']['id']), array('title' => __d('baser', '公開'), 'class' => 'btn-publish bca-btn-icon', 'data-bca-btn-type' => 'publish','data-bca-btn-size' => 'lg')) ?>
<?php if ($data['Site']['status']) : ?>
		<?php $this->BcBaser->link('', $url, array('title' => __d('baser', '確認'), 'target' => '_blank', 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'preview','data-bca-btn-size' => 'lg')) ?>
<?php endif ?>
		<?php $this->BcBaser->link('', array('action' => 'edit', $data['Site']['id']), array('title' => __d('baser', '編集'), 'class' => ' bca-btn-icon', 'data-bca-btn-type' => 'edit','data-bca-btn-size' => 'lg')) ?>
	</td>
	<td class="bca-table-listup__tbody-td" style="width:5%"><?php echo $data['Site']['id']; ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['Site']['display_name'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php $this->BcBaser->link($data['Site']['name'], array('action' => 'edit', $data['Site']['id'])); ?><br>
		<?php echo $data['Site']['alias'] ?>
	</td>
	<td class="bca-table-listup__tbody-td" style="width:5%;" class="align-center status">
		<?php echo $this->BcText->booleanMark($data['Site']['status']); ?><br />
	</td>
	<td class="bca-table-listup__tbody-td" class="align-center">
		<?php echo $this->BcText->arrayValue($data['Site']['device'], $devices, ''); ?><br>
		<?php echo $this->BcText->arrayValue($data['Site']['lang'], $langs, ''); ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $this->BcText->arrayValue($data['Site']['main_site_id'], $mainSites, ''); ?><br>
		<?php echo $this->BcText->noValue($data['Site']['theme'], $this->BcBaser->siteConfig['theme']) ?>
	</td>
	<td class="bca-table-listup__tbody-td" style="width:10%;white-space: nowrap">
		<?php echo $this->BcTime->format('Y-m-d', $data['Site']['created']) ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['Site']['modified']) ?>
	</td>
</tr>