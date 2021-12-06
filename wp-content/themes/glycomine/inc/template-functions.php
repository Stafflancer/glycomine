<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Glycomine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function glycomine_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'glycomine_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function glycomine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'glycomine_pingback_header' );

/**
 * Change label Posts to News
 */
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
	/* оригинал
		stdClass Object (
			'name'                  => 'Записи',
			'singular_name'         => 'Запись',
			'add_new'               => 'Добавить новую',
			'add_new_item'          => 'Добавить запись',
			'edit_item'             => 'Редактировать запись',
			'new_item'              => 'Новая запись',
			'view_item'             => 'Просмотреть запись',
			'search_items'          => 'Поиск записей',
			'not_found'             => 'Записей не найдено.',
			'not_found_in_trash'    => 'Записей в корзине не найдено.',
			'parent_item_colon'     => '',
			'all_items'             => 'Все записи',
			'archives'              => 'Архивы записей',
			'insert_into_item'      => 'Вставить в запись',
			'uploaded_to_this_item' => 'Загруженные для этой записи',
			'featured_image'        => 'Миниатюра записи',
			'set_featured_image'    => 'Задать миниатюру',
			'remove_featured_image' => 'Удалить миниатюру',
			'use_featured_image'    => 'Использовать как миниатюру',
			'filter_items_list'     => 'Фильтровать список записей',
			'items_list_navigation' => 'Навигация по списку записей',
			'items_list'            => 'Список записей',
			'menu_name'             => 'Записи',
			'name_admin_bar'        => 'Запись',
		)
	*/

	$new = array(
		'name'                  => 'News',
		'singular_name'         => 'News',
		'add_new'               => 'Add News',
		'add_new_item'          => 'Add News',
		'edit_item'             => 'Edit News',
		'new_item'              => 'New News',
		'view_item'             => 'Look News',
		'search_items'          => 'Search News',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found',
		'parent_item_colon'     => '',
		'all_items'             => 'All News',
		'archives'              => 'Archive News',
		'insert_into_item'      => 'Insert To Item',
		'uploaded_to_this_item' => 'Downloaded For This Article',
		'featured_image'        => 'Article Thumbnail',
		'filter_items_list'     => 'Filter Article List',
		'items_list_navigation' => 'Navigating The List Of Articles',
		'items_list'            => 'List Of News',
		'menu_name'             => 'News',
		'name_admin_bar'        => 'News', // пункте "добавить"
	);

	return (object) array_merge( (array) $labels, $new );
}
