<?php
/**
 * ContentBlogTagFindCustomPrams Fixture
 */
class ContentBlogTagFindCustomPramsFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = ['model' => 'Content'];

/**
 * Records
 *
 * @var array
 */
	public $records = [
		[
			'id' => '1',
			'name' => '',
			'plugin' => 'Core',
			'type' => 'ContentFolder',
			'entity_id' => '1',
			'url' => '/',
			'site_id' => '0',
			'alias_id' => null,
			'main_site_content_id' => null,
			'parent_id' => null,
			'lft' => '1',
			'rght' => '10',
			'level' => '0',
			'title' => 'baserCMS inc. [デモ]',
			'description' => '',
			'eyecatch' => '',
			'author_id' => '1',
			'layout_template' => 'default',
			'status' => 1,
			'publish_begin' => null,
			'publish_end' => null,
			'self_status' => 1,
			'self_publish_begin' => null,
			'self_publish_end' => null,
			'exclude_search' => 0,
			'created_date' => '2017-07-09 03:38:07',
			'modified_date' => '2017-07-08 13:10:06',
			'site_root' => 1,
			'deleted_date' => null,
			'deleted' => 0,
			'exclude_menu' => 0,
			'blank_link' => 0,
			'created' => '2017-07-08 13:10:03',
			'modified' => '2017-07-09 03:38:07'
		],
		[
			'id' => '3',
			'name' => 's',
			'plugin' => 'Core',
			'type' => 'ContentFolder',
			'entity_id' => '3',
			'url' => '/s/',
			'site_id' => '2',
			'alias_id' => null,
			'main_site_content_id' => '1',
			'parent_id' => '1',
			'lft' => '2',
			'rght' => '5',
			'level' => '1',
			'title' => 'baserCMS inc.｜スマホ',
			'description' => '',
			'eyecatch' => '',
			'author_id' => '1',
			'layout_template' => 'default',
			'status' => 1,
			'publish_begin' => null,
			'publish_end' => null,
			'self_status' => 1,
			'self_publish_begin' => null,
			'self_publish_end' => null,
			'exclude_search' => 0,
			'created_date' => '2017-07-09 03:38:07',
			'modified_date' => '2017-07-08 13:10:06',
			'site_root' => 1,
			'deleted_date' => null,
			'deleted' => 0,
			'exclude_menu' => 0,
			'blank_link' => 0,
			'created' => '2017-07-08 13:10:03',
			'modified' => '2017-07-09 19:44:03'
		],
		[
			'id' => '16',
			'name' => 'blog1',
			'plugin' => 'Blog',
			'type' => 'BlogContent',
			'entity_id' => '1',
			'url' => '/blog1/',
			'site_id' => '0',
			'alias_id' => null,
			'main_site_content_id' => null,
			'parent_id' => '1',
			'lft' => '6',
			'rght' => '7',
			'level' => '1',
			'title' => 'ブログ１',
			'description' => '',
			'eyecatch' => '',
			'author_id' => '1',
			'layout_template' => '',
			'status' => 1,
			'publish_begin' => null,
			'publish_end' => null,
			'self_status' => 1,
			'self_publish_begin' => null,
			'self_publish_end' => null,
			'exclude_search' => 0,
			'created_date' => '2017-07-09 03:38:07',
			'modified_date' => '2017-07-08 13:10:07',
			'site_root' => 0,
			'deleted_date' => null,
			'deleted' => 0,
			'exclude_menu' => 0,
			'blank_link' => 0,
			'created' => '2017-07-08 13:10:03',
			'modified' => '2017-07-09 19:42:12'
		],
		[
			'id' => '21',
			'name' => 'blog2',
			'plugin' => 'Blog',
			'type' => 'BlogContent',
			'entity_id' => '2',
			'url' => '/blog2/',
			'site_id' => '0',
			'alias_id' => null,
			'main_site_content_id' => null,
			'parent_id' => '1',
			'lft' => '8',
			'rght' => '9',
			'level' => '1',
			'title' => 'ブログ２',
			'description' => '',
			'eyecatch' => null,
			'author_id' => '1',
			'layout_template' => '',
			'status' => 1,
			'publish_begin' => null,
			'publish_end' => null,
			'self_status' => 1,
			'self_publish_begin' => null,
			'self_publish_end' => null,
			'exclude_search' => 0,
			'created_date' => '2017-07-09 19:45:15',
			'modified_date' => '2017-07-09 19:45:34',
			'site_root' => 0,
			'deleted_date' => null,
			'deleted' => 0,
			'exclude_menu' => 0,
			'blank_link' => 0,
			'created' => '2017-07-09 19:45:16',
			'modified' => '2017-07-09 19:49:18'
		],
		[
			'id' => '22',
			'name' => 'blog3',
			'plugin' => 'Blog',
			'type' => 'BlogContent',
			'entity_id' => '3',
			'url' => '/s/blog3/',
			'site_id' => '2',
			'alias_id' => null,
			'main_site_content_id' => null,
			'parent_id' => '3',
			'lft' => '3',
			'rght' => '4',
			'level' => '2',
			'title' => 'ブログ３',
			'description' => '',
			'eyecatch' => null,
			'author_id' => '1',
			'layout_template' => '',
			'status' => 1,
			'publish_begin' => null,
			'publish_end' => null,
			'self_status' => 1,
			'self_publish_begin' => null,
			'self_publish_end' => null,
			'exclude_search' => 0,
			'created_date' => '2017-07-09 19:49:57',
			'modified_date' => '2017-07-09 19:50:16',
			'site_root' => 0,
			'deleted_date' => null,
			'deleted' => 0,
			'exclude_menu' => 0,
			'blank_link' => 0,
			'created' => '2017-07-09 19:49:57',
			'modified' => '2017-07-09 19:50:16'
		],
	];

}