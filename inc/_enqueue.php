<?php
add_action("wp_enqueue_scripts", "custom_enqueue_scripts");
function custom_enqueue_scripts() {
    $css_path = get_stylesheet_directory() . "/dist/main.css";
    $version  = filemtime($css_path);
    wp_enqueue_style("custom-main", get_template_directory_uri() . "/dist/main.css", [], $version);
    $js_path = get_stylesheet_directory() . "/dist/main.js";
    $version = filemtime($js_path);
    wp_enqueue_script("custom-main", get_template_directory_uri() . "/dist/main.js", ['jquery'], $version, true);
}