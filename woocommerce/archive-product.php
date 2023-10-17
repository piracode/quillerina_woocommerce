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

    // Check if this is the "Pet Portraits" category
    if ($category->slug === 'pet-portraits') {
        // Get the first product in the "Pet Portraits" category
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'pet-portraits'  // category slug
                )
            )
        );
        $pet_portraits_product = new WP_Query($args);

        // Check if there's a product in the category
        if ($pet_portraits_product->have_posts()) {
            $pet_portraits_product->the_post();
            $product_permalink = esc_url(get_permalink());
        } else {
            // If no product found, link to the category archive
            $product_permalink = $category_link;
        }
    } else {
        // For other categories, link to their respective category archives
        $product_permalink = $category_link;
    }

    echo '<a href="' . $product_permalink . '">';
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
