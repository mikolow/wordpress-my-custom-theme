<?php

add_action("after_setup_theme", "custom_setup_theme", 0);

function custom_setup_theme() {
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("menus");
    add_theme_support("html5", [
        "search-form",
        "comment-form",
        "comment-list",
        "gallery",
        "caption",
        "style",
        "script",
    ]);

    add_theme_support('custom-logo', [
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    add_theme_support('wp-block-styles');
}

add_theme_support('editor-styles');
add_action('admin_init', 'add_editor_styles');

function add_editor_styles() {
    add_editor_style('dist/editor-style.css');
}