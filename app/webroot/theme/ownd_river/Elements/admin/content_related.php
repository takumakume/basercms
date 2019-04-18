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
 * 関連コンテンツ
 * @var string $mainSiteDisplayName メインサイト表示名称
 * @var array $relatedContents 関連コンテンツ
 * @var array $sites サイトリスト
 * @var int $currentSiteId 現在のサイトID
 */
$pureUrl = $this->BcContents->getPureUrl($this->request->data['Content']['url'], $this->request->data['Site']['id']);
?>


<?php if(count($relatedContents) > 1): ?>
	<section id="RelatedContentsSetting" class="bca-section" data-bca-section-type="form-group">
		<h3 class="bca-main__heading" data-bca-heading-size="lg">関連コンテンツ</h3>
		<table class="list-table bca-table" data-bca-table-type="type2">
      <thead>
			<tr>
				<th>&nbsp</th>
				<th>サイト名</th>
				<th>メインサイト</th>
				<th>タイトル</th>
				<th>エイリアス</th>
			</tr>
      </thead>
      <tbody>
			<?php foreach($relatedContents as $relatedContent): ?>
				<?php
				$class = $editUrl = $checkUrl = '';
				$current = false;
				if(!empty($relatedContent['Content'])){
					if(!$relatedContent['Content']['alias_id']) {
						$editUrl = $this->BcContents->settings[$relatedContent['Content']['type']]['url']['edit'];
						if($relatedContent['Content']['entity_id']) {
							$editUrl .= '/' . $relatedContent['Content']['entity_id'];
						}
						$editUrl .= '/content_id:' . $relatedContent['Content']['id'] . '#RelatedContentsSetting';
					} else {
						$editUrl = '/admin/contents/edit_alias/' . $relatedContent['Content']['id'] . '#RelatedContentsSetting';
					}
					if($this->request->data['Content']['id'] == $relatedContent['Content']['id']) {
						$current = true;
						$class = ' class="bca-currentrow"';
					}
				} else {
					$class = ' class="bca-disablerow"';
				}
				$prefix =$relatedContent['Site']['name'];
				if($relatedContent['Site']['alias']) {
					$prefix = $relatedContent['Site']['alias'];
				}
				$targetUrl = '/' . $prefix . $pureUrl;
				$mainSiteId = $relatedContent['Site']['main_site_id'];
				if($mainSiteId === '') {
					$mainSiteId = 0;
				}
				?>
				<tr<?php echo $class ?> id="Row<?php echo $relatedContent['Site']['id'] ?>">
					<td class="cel1">
						<?php if(!$current): ?>
							<?php if(!empty($relatedContent['Content'])): ?>
								<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_check.png', array('alt' => __d('baser', '確認'))), $relatedContent['Content']['url'], array('title' => __d('baser', '確認'), 'target' => '_blank')) ?>
								<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('alt' => __d('baser', '編集'))), $editUrl, array('title' => __d('baser', '編集'))) ?>
							<?php elseif($currentSiteId == $mainSiteId && $this->BcForm->value('Content.type') != 'ContentFolder'): ?>
								<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icon_alias.png', array('alt' => __d('baser', 'エイリアス作成'))) . '<span class="icon-add-layerd"></span>', 'javascript:void(0)', array('class' => 'create-alias', 'title' => __d('baser', 'エイリアス作成'), 'target' => '_blank', 'data-site-id' => $relatedContent['Site']['id'])) ?>
								<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_copy.png', array('alt' => __d('baser', 'コピー作成'))) . '<span class="icon-add-layerd"></span>', 'javascript:void(0)', array('class' => 'create-copy', 'title' => __d('baser', 'コピー作成'), 'target' => '_blank', 'data-site-id' => $relatedContent['Site']['id'])) ?>
							<?php endif ?>
						<?php endif ?>
						<?php echo $this->BcForm->input('Site.display_name' . $relatedContent['Site']['id'], array('type' => 'hidden', 'value' => $relatedContent['Site']['display_name'])) ?>
						<?php echo $this->BcForm->input('Site.target_url' . $relatedContent['Site']['id'], array('type' => 'hidden', 'value' => $targetUrl)) ?>
					</td>
					<td class="cel2"><?php echo $relatedContent['Site']['display_name'] ?></td>
					<td class="cel3">
						<?php echo $this->BcText->arrayValue($relatedContent['Site']['main_site_id'], $sites,  $mainSiteDisplayName) ?>
					</td>
					<td class="cel4">
						<?php if(!empty($relatedContent['Content'])): ?>
							<?php echo $relatedContent['Content']['title'] ?>
							<?php if(!empty($relatedContent['Content'])): ?>
								<small>（<?php echo $this->BcContents->settings[$relatedContent['Content']['type']]['title'] ?>）</small>
							<?php endif ?>
						<?php else: ?>
							<small>未登録</small>
						<?php endif ?>
					</td>
					<td class="cel5">
						<?php if(!empty($relatedContent['Content']) && !empty($relatedContent['Content']['alias_id'])): ?>
              <i class="fa fa-check-square" aria-hidden="true"></i>
            <?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
      </tbody>
		</table>
	</section>
<?php endif ?>