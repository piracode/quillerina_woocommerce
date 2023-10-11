<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 */

defined('ABSPATH') || exit;

get_header('shop');

// Retrieve product categories
$product_categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => true,
));

echo '<h1 class="shop-page-title">Discover Unique Handcrafted Treasures</h1>';

echo '<div class="category-container">';

foreach ($product_categories as $category) {
    // Get category link
    $category_link = esc_url(get_term_link($category));

    // Display category title, image, and description wrapped in a link
    echo '<article class="category-link">';
    echo '<a href="' . $category_link . '">';
    echo '<h2>' . esc_html($category->name) . '</h2>';

    // Display category image
    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
    if ($thumbnail_id) {
        echo '<div id="category-thumbnail-' . $category->term_id . '">';
        echo wp_get_attachment_image($thumbnail_id, 'custom-thumbnail');
        echo '</div>';
    }
    echo '<p class="category-description">' . esc_html($category->description) . '</p>';
    echo '</a>';
    echo '</article>';
}

echo '</div>';


get_footer('shop');
