<?php

/**
 * The Template for displaying product archives for the "Christmas Ornaments" category.
 *
 */

defined('ABSPATH') || exit;

get_header('shop');

if (have_posts()) {
    while (have_posts()) {
        the_post();
        wc_get_template_part('content', 'product');
    }
} else {
    echo 'No products found.';
}

get_footer('shop');
