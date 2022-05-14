<?php

//disable srcset for localWP live link

function wdo_disable_srcset($sources) {
    return false;
}

add_filter('wp_calculate_image_srcset', 'wdo_disable_srcset');