<?php
/*
 Plugin Name: Philosophy-Companion
 Plugin URI:
 Description: Companion plugin for philosophy theme
 Version: 1.0
 Author: Omar Sharif Ansary
 Author URI: 
 License: GPLv2 or later
 Text Domain: philosophy_companion
 */

// Register Custom Post Type Book

require_once dirname(__FILE__)."/gmap_ui.php";

function create_book_cpt()
{

    $labels = array(
        'name' => _x('Books', 'Post Type General Name', 'philosophy'),
        'singular_name' => _x('Book', 'Post Type Singular Name', 'philosophy'),
        'menu_name' => _x('Books', 'Admin Menu text', 'philosophy'),
        'name_admin_bar' => _x('Book', 'Add New on Toolbar', 'philosophy'),
        'archives' => __('Book Archives', 'philosophy'),
        'attributes' => __('Book Attributes', 'philosophy'),
        'parent_item_colon' => __('Parent Book:', 'philosophy'),
        'all_items' => __('All Books', 'philosophy'),
        'add_new_item' => __('Add New Book', 'philosophy'),
        'add_new' => __('Add New', 'philosophy'),
        'new_item' => __('New Book', 'philosophy'),
        'edit_item' => __('Edit Book', 'philosophy'),
        'update_item' => __('Update Book', 'philosophy'),
        'view_item' => __('View Book', 'philosophy'),
        'view_items' => __('View books', 'philosophy'),
        'search_items' => __('Search Book', 'philosophy'),
        'not_found' => __('Not found', 'philosophy'),
        'not_found_in_trash' => __('Not found in Trash', 'philosophy'),
        'featured_image' => __('Featured Image', 'philosophy'),
        'set_featured_image' => __('Set featured image', 'philosophy'),
        'remove_featured_image' => __('Remove featured image', 'philosophy'),
        'use_featured_image' => __('Use as featured image', 'philosophy'),
        'insert_into_item' => __('Insert into Book', 'philosophy'),
        'uploaded_to_this_item' => __('Uploaded to this Book', 'philosophy'),
        'items_list' => __('books list', 'philosophy'),
        'items_list_navigation' => __('books list navigation', 'philosophy'),
        'filter_items_list' => __('Filter books list', 'philosophy'),
    );
    $args = array(
        'label' => __('Book', 'philosophy'),
        'description' => __('', 'philosophy'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => "books",
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array(
            'with_front' => false,
        )
    );
    register_post_type('book', $args);
}
add_action('init', 'create_book_cpt', 0);


function philosophy_button($attributes)
{
    $default = array(
        'type'  =>  'primary',
        'title' =>  __('Buttoon', 'philosophy'),
        'url'   =>  ''
    );
    $button_attributes = shortcode_atts($default, $attributes);

    return printf(
        '<a target="_blank" class="btn btn--%s full-width" href="%s">%s</a>',
        $button_attributes['type'],
        $button_attributes['url'],
        $button_attributes['title']
    );
}
add_shortcode('button', 'philosophy_button');

function philosophy_button2($attributes, $content = '')
{
    $default = array(
        'type'  =>  'primary',
        'title' =>  __('Buttoon', 'philosophy'),
        'url'   =>  ''
    );
    $button_attributes = shortcode_atts($default, $attributes);

    return printf(
        '<a target="_blank" class="btn btn--%s full-width" href="%s">%s</a>',
        $button_attributes['type'],
        $button_attributes['url'],
        do_shortcode($content)
    );
}
add_shortcode('button2', 'philosophy_button2');

function philosophy_uppercase($attributes, $content = '')
{
    return strtoupper(do_shortcode($content));
}
add_shortcode('uc', 'philosophy_uppercase');

function philosophy_google_map($attributes)
{
    $default = array(
        'place' => 'Dhaka Museum',
        'width' => '800',
        'height' => '500',
        'zoom' => '14'
    );

    $params = shortcode_atts($default, $attributes);

    $map = <<<EOD
<div>
    <div>
        <iframe width="{$params['width']}" height="{$params['height']}"
                src="https://maps.google.com/maps?q={$params['place']}&t=&z={$params['zoom']}&ie=UTF8&iwloc=&output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
    </div>
</div>
EOD;

    return $map;
}
add_shortcode('gmap', 'philosophy_google_map');
