<?php
/**
 * Custom ACF functions.
 *
 * A place to custom functionality related to Advanced Custom Fields.
 *
 * @package bop
 */

// If ACF isn't activated, then bail.
if (!class_exists('ACF')) {
    return false;
}

/**
 * ACF Menu Hide Based on User Role.
 */
function glycomine_acf_show_admin($show)
{
    return current_user_can('manage_options');
}

add_filter('acf/settings/show_admin', 'glycomine_acf_show_admin');

/**
 * Add ACF theme options support
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => true,
        'position'   => 3.1,
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'General Settings',
        'menu_title'  => 'General',
        'parent_slug' => 'theme-settings',
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'theme-settings',
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'theme-settings',
    ]);
}