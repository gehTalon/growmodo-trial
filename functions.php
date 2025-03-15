<?php
/**
 * Theme Functions
 * @package Growmodo
 */

require_once get_template_directory() . '/src/blocks/blocks.php';


function growmodo_setup() {    
    // Add support for featured images and title tag
    add_theme_support('post-thumbnails');    
    add_theme_support('title-tag');   

    // Register Menus
    register_nav_menus([
        'primary'  => __('Primary Menu', 'growmodo'),
        'footer1'  => __('Footer Menu Home', 'growmodo'),
        'footer2'  => __('Footer Menu About Us', 'growmodo'),
        'footer3'  => __('Footer Menu Properties', 'growmodo'),
        'footer4'  => __('Footer Menu Services', 'growmodo'),
        'footer5'  => __('Footer Menu Contact', 'growmodo'),
    ]);
}
add_action('after_setup_theme', 'growmodo_setup');


function growmodo_enqueue_scripts() {   
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

    // SwiperJS CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');

    // Theme CSS
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], null, true);

    // SwiperJS JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'growmodo_enqueue_scripts');



if (function_exists('acf_register_block_type')) {

    // Register ACF blocks dynamically from $blocks
    function growmodo_register_acf_blocks() {
        global $blocks; // Get blocks defined in blocks.php

        if (!empty($blocks)) {
            foreach ($blocks as $block) {
                acf_register_block_type([
                    'name'            => $block['name'],
                    'title'           => __($block['title'], 'growmodo'),
                    'description'     => __($block['description'], 'growmodo'),
                    'keywords'        => $block['keywords'],
                    'enqueue_style'   => get_stylesheet_directory_uri() . '/src/blocks/' . $block['name'] . '/css/' . $block['name'] . '.css',
                    'enqueue_script'  => $block['has-js'] ? get_stylesheet_directory_uri() . '/src/blocks/' . $block['name'] . '/js/' . $block['name'] . '.js' : '',
                    'category'        => 'layouts',
                    'icon'            => 'archive',
                    'render_callback' => 'growmodo_acf_block_render_callback',
                    'mode'            => 'edit',
                ]);
            }
        }
    }
    add_action('acf/init', 'growmodo_register_acf_blocks');
}


function growmodo_acf_block_render_callback($block) {
    $slug = str_replace('acf/', '', $block['name']);
    $block_file = get_theme_file_path("src/blocks/{$slug}/{$slug}.php");

    if (file_exists($block_file)) {
        include $block_file;
    }
}
