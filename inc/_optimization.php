<?php

// Remove auto p from Contact Form 7 shortcode output
add_filter('wpcf7_autop_or_not', '__return_false');


add_action('wp_default_scripts', 'move_jquery_into_footer');
function move_jquery_into_footer($wp_scripts) {

    if (is_admin()) {
        return;
    }

    $wp_scripts->add_data('jquery', 'group', 1);
    $wp_scripts->add_data('jquery-core', 'group', 1);
    $wp_scripts->add_data('jquery-migrate', 'group', 1);
}


function remove_wp_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
    wp_dequeue_style('storefront-gutenberg-blocks');
}

add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 10);


remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
//remove_action('render_block', 'wp_render_duotone_support', 10);
//remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
//remove_action('wp_footer', 'wp_enqueue_global_styles', 1);



/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}

add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 *
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}


//add_action('wp_print_scripts', 'wsds_detect_enqueued_scripts');
//function wsds_detect_enqueued_scripts() {
//    global $wp_scripts;
//    foreach ($wp_scripts->queue as $handle) :
//        echo $handle . ' | ';
//    endforeach;
//}


add_filter('script_loader_tag', 'wsds_defer_scripts', 10, 3);
function wsds_defer_scripts($tag, $handle, $src) {

    // The handles of the enqueued scripts we want to defer
    $defer_scripts = array(
        'admin-bar',
        'contact-form-7',
        'custom-main',
        'jquery-migrate',
    );

    if (in_array($handle, $defer_scripts)) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }

    return $tag;
}