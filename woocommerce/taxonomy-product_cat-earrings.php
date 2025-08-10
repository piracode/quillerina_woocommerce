<?php

/**
 * The Template for displaying product archives for the "Earrings" category.
 *
 */

defined('ABSPATH') || exit;

get_header('shop');
echo '<h1>Our Earrings Collection</h1>';
echo '<section class="category-products-section">';
if (have_posts()) {
    while (have_posts()) {
        the_post();
        global $product;

        // Wrap the eqch product in an anchor tag and an article tag
        echo '<article class="product-container">';
        echo '<a href="' . esc_url($product->get_permalink()) . '">';

        // Display product title
        echo '<h2>' . get_the_title() . '</h2>';

        if (has_post_thumbnail()) {
            // Display the product thumbnail
            the_post_thumbnail('custom-thumbnail');
        }

        // Display product price
        echo '<p>' . $product->get_price_html() . '</p>';

        // Display "Select options" button
        if ($product->is_type('variable')) {
            echo '<button class="option-button">' . esc_html__('See available colors', 'woocommerce') . '</button>';
        }

        echo '</a>';
        echo '</article>';
    }
} else {
    echo 'No products found.';
}

echo '</section>';

get_footer('shop');
