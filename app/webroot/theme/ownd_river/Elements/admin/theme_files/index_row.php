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
 * [ADMIN] テーマファイル一覧　行
 */
$writable = true;
if ((is_dir($fullpath) && !is_writable($fullpath)) || $theme == 'core') {
	$writable = false;
}
$params = explode('/', $path);
array_push($params, $data['name']);
?>


<tr>
  <td class="bca-table-listup__tbody-td bca-table-listup__tbody-td--select">
		<?php if ($this->BcBaser->isAdminUser()): ?>
			<?php echo $this->BcForm->input('ListTool.batch_targets.' . str_replace('.', '_', $data['name']), ['type' => 'checkbox', 'label'=> '<span class="bca-visually-hidden">チェックする</span>', 'class' => 'batch-targets bca-checkbox__input', 'value' => $data['name']]) ?>
		<?php endif ?>

  </td>
	<td class="bca-table-listup__tbody-td" data-bca-text-size="lg">
		<?php if ($data['type'] == 'image'): ?>
			<?php
			$this->BcBaser->link(
				$this->BcBaser->getImg(array_merge(array('action' => 'img_thumb', 100, 100, $theme, $plugin, $type), $params), array('alt' => $data['name'])), array_merge(array('action' => 'img', $theme, $plugin, $type), explode('/', $path), array($data['name'])), array('rel' => 'colorbox', 'title' => $data['name'], 'style' => 'display:block;padding:5px;important;float:left;background-color:#FFFFFF'), null, false)
			?>&nbsp;
			<?php echo $data['name'] ?>
		<?php elseif ($data['type'] == 'folder'): ?>
      <?php $this->BcBaser->link(
              '<i class="bca-icon--folder" data-bca-icon-size="lg"></i>'.$data['name'],
              array_merge(
                array('action' => 'index', $theme, $plugin, $type),
                $params
              ),
              array(
                'class' => '',
              )
            )
      ?>/

		<?php else: ?>
      <?php $this->BcBaser->link(
        '<i class="bca-icon--file" data-bca-icon-size="lg"></i>'.$data['name'],
        array_merge(
          array('action' => 'index', $theme, $plugin, $type),
          $params
        ),
        array(
          'class' => '',
        )
      )
      ?>
		<?php endif ?>
	</td>
  <td class="row-tools bca-table-listup__tbody-td bca-table-listup__tbody-td--actions"><?php // アクション ?>
    <?php /* フォルダーは名前にリンクを貼るので不要
    <?php if ($data['type'] == 'folder'): ?>
      <?php $this->BcBaser->link('', array_merge(array('action' => 'index', $theme, $plugin, $type), $params), array('title' => __d('baser', '開く'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'open', 'data-bca-btn-size' => 'lg')) ?>
    <?php endif ?>
    */ ?>
    <?php if ($writable): ?>
      <?php $this->BcBaser->link('', array_merge(array('action' => 'ajax_copy', $theme, $type), $params), array('title' => __d('baser', 'コピー'), 'class' => 'btn-copy bca-btn-icon', 'data-bca-btn-type' => 'copy', 'data-bca-btn-size' => 'lg')) ?>
      <?php if ($data['type'] == 'folder'): ?>
        <?php $this->BcBaser->link('', array_merge(array('action' => 'edit_folder', $theme, $type), $params), array('title' => __d('baser', '編集'), 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit', 'data-bca-btn-size' => 'lg')) ?>
      <?php else: ?>
        <!-- imgは削除対象 -->
        <?php $this->BcBaser->link('', array_merge(array('action' => 'edit', $theme, $type), $params), array('title' => __d('baser', '編集'), 'escape' => false, 'class' => 'bca-btn-icon', 'data-bca-btn-type' => 'edit', 'data-bca-btn-size' => 'lg')) ?>
      <?php endif ?>
      <?php $this->BcBaser->link('', array_merge(array('action' => 'ajax_del', $theme, $type), $params), array('title' => __d('baser', '削除'), 'class' => 'btn-delete bca-btn-icon', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'lg')) ?>
    <?php else: ?>
      <?php if ($data['type'] == 'folder'): ?>
        <?php $this->BcBaser->link('', array_merge(array('action' => 'view_folder', $theme, $plugin, $type), $params), array('class' => 'btn-gray-s button-s bca-btn-icon', 'data-bca-btn-type' => 'preview', 'data-bca-btn-size' => 'lg')) ?>
      <?php else: ?>
        <?php $this->BcBaser->link('', array_merge(array('action' => 'view', $theme, $plugin, $type), $params), array('class' => 'btn-gray-s button-s bca-btn-icon', 'data-bca-btn-type' => 'preview', 'data-bca-btn-size' => 'lg')) ?>
      <?php endif ?>
    <?php endif ?>
  </td>
</tr>