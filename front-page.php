<?php

/**
 * Template Name: Front Page
 *
 * Custom template for displaying the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quillerina-theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php while (have_posts()) : the_post(); ?>
		<section class="section-hero">
			<?php
			if (function_exists('get_field')) {
				$hero_heading = get_field('hero_section')['hero_heading'];
				if ($hero_heading) {
					echo '<h1>' . $hero_heading . '</h1>';
				}
				$welcome_message = get_field('hero_section')['welcome_message'];

				if ($welcome_message) {
					echo '<p>' . $welcome_message . '</p>';
				}

				$shop_now_cta = get_field('hero_section')['shop_now_cta'];
				if ($shop_now_cta) {
					$shop_now_cta_url = $shop_now_cta['url'];
					$shop_now_cta_title = $shop_now_cta['title'];
					// var_dump($shop_now_cta_title);
					echo '<a class="hero-cta" href="' . $shop_now_cta_url . '">' . $shop_now_cta_title . '</a>';
				}
				$custom_orders_cta = get_field('hero_section')['custom_orders_cta'];
				if ($custom_orders_cta) {
					$custom_orders_cta_url = $custom_orders_cta['url'];
					$custom_orders_cta_title = $custom_orders_cta['title'];
					echo '<a class="hero-cta" href="' . $custom_orders_cta_url . '">' . $custom_orders_cta_title . '</a>';
				}

				if (function_exists('get_field')) {
					echo '<div class="gallery">';
					for ($i = 1; $i <= 6; $i++) {
						$image = get_field('hero_section')['hero_image_gallery_' . $i];
						if ($image) {
							echo '<figure class="gallery-item">';
							echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
							echo '</figure>';
						}
					}
					echo '</div>';
				}
			}
			?>
		</section>

		<section class="featured-artwork">

			<?php
			if (function_exists('get_field')) {
				$featured_art_heading = get_field('featured_art_section')['featured_art_heading'];
				if ($featured_art_heading) {
					echo '<h2>' . $featured_art_heading . '</h2>';
				}
			}
			$term_slug = 'featured-images-landing-page';

			$args = array(
				'post_type' => 'gallery',
				'tax_query' => array(
					array(
						'taxonomy' => 'images-category',
						'field'    => 'slug',
						'terms'    => $term_slug,
					),
				),
			);

			$gallery_query = new WP_Query($args);

			if ($gallery_query->have_posts()) {
				echo '<div class="gallery-container">';
				while ($gallery_query->have_posts()) {
					$gallery_query->the_post();
					$thumbnail_id = get_post_thumbnail_id();
					$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full');
					if ($thumbnail_url) {
						echo '<div class="gallery-item">';
						echo '<img src="' . $thumbnail_url[0] . '" alt="Larger Image">';
						echo '</div>';
					}
				}
				echo '</div>';
				wp_reset_postdata();
			}
			?>
		</section>



		<section class="faq-section">




			<?php
			if (function_exists('get_field')) {
				$faq_section = get_field('faq_section'); // Retrieve the faq_section field

				$faq_heading = $faq_section['faq_heading'];
				if ($faq_heading) {
					echo '<h2>' . $faq_heading . '</h2>';
				}

				// Loop through the questions using a for loop
				for ($i = 1; $i <= 5; $i++) {
					$question_svg = $faq_section['question' . $i . '_svg'];
					if ($question_svg) {
						echo $question_svg;
					}

					$question_heading = $faq_section['question' . $i . '_heading'];
					if ($question_heading) {
						echo '<h3>' . $question_heading . '</h3>';
					}

					$question_text = $faq_section['question' . $i . '_text'];
					if ($question_text) {
						echo '<p>' . $question_text . '</p>';
					}
				}
			}
			?>
		</section>



	<?php endwhile; ?>
</main>

<?php
get_footer();
?>