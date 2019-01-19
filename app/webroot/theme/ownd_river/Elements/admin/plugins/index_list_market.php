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
 * [ADMIN] プラグイン一覧　テーブル
 */
?>


<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
<thead class="bca-table-listup__thead">
	<tr class="list-tool bca-table-listup__thead-th bca-table-listup__thead-th--select">
		<th class="bca-table-listup__thead-th">&nbsp;</th>
		<th class="bca-table-listup__thead-th">プラグイン名</th>
		<th class="bca-table-listup__thead-th">バージョン</th>
		<th class="bca-table-listup__thead-th">説明</th>
		<th class="bca-table-listup__thead-th">開発者</th>
		<th class="bca-table-listup__thead-th">登録日<br />更新日</th>
	</tr>
</thead>
<tbody>
	<?php if (!empty($baserPlugins)): ?>
		<?php foreach ($baserPlugins as $data): ?>
			<?php $this->BcBaser->element('plugins/index_row_market', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="6">
				<p class="no-data">baserマーケットのテーマを読み込めませんでした。</p>
			</td>
		</tr>
	<?php endif; ?>
</tbody>
</table>
