<?php
function custom_blocks_init() {
    acf_add_options_page([
        'page_title' => 'Opcje strony',
        'menu_title' => 'Opcje strony',
        'menu_slug'  => 'opcje',
        'capability' => 'edit_posts',
        'position'   => 3,
        'icon_url'   => 'dashicons-admin-tools'
    ]);
    acf_add_options_sub_page(array(
        'page_title'  => 'Dane kontaktowe',
        'menu_title'  => 'Dane kontaktowe',
        'parent_slug' => 'opcje',
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Stopka',
        'menu_title'  => 'Stopka',
        'parent_slug' => 'opcje',
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Cookies',
        'menu_title'  => 'Cookies',
        'parent_slug' => 'opcje',
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Inne',
        'menu_title'  => 'Inne',
        'parent_slug' => 'opcje',
    ));

}

add_action("acf/init", "custom_blocks_init");