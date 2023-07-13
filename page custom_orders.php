<?php
/*
Template Name: Custom Orders 
Template Post Type: page

* Custom template for displaying the custom order page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quillerina-theme
*/

get_header();
?>
<main id="primary" class="site-main">
	<section class="section-custom-orders">

		<?php
		if (function_exists('get_field')) {
			$back_home_page_svg = get_field('back_home_page_svg');
			if ($back_home_page_svg) {
				echo $back_home_page_svg;
			}

			$back_home_link = get_field('back_home_link');
			if ($back_home_link) {
				$back_home_link_url = $back_home_link['url'];
				$back_home_link_title = $back_home_link['title'];
				echo '<a class="hero-cta" href="' . $back_home_link_url . '">' . $back_home_link_title . '</a>';
			}

			$custom_orders_heading = get_field('custom_orders_heading');
			if ($custom_orders_heading) {
				echo '<h2 class="custom-orders-heading">' . $custom_orders_heading . '</h2>';
			}

			$pet_portraits_subheading = get_field('pet_portraits_subheading');
			if ($pet_portraits_subheading) {
				echo '<h3 class="pet_portraits_subheading">' . $pet_portraits_subheading . '</h3>';
			}

			$pet_portrait_orders_description = get_field('pet_portrait_orders_description');
			if ($pet_portrait_orders_description) {
				echo '<p class="pet_portrait_orders_description">' . $pet_portrait_orders_description . '</p>';
			}

			$get_your_pet_portrait_link = get_field('get_your_pet_portrait_link');
			if ($get_your_pet_portrait_link) {
				$get_your_pet_portrait_link_url = $get_your_pet_portrait_link['url'];
				$get_your_pet_portrait_link_title = $get_your_pet_portrait_link['title'];
				echo '<a class="hero-cta" href="' . $get_your_pet_portrait_link_url . '">' . $get_your_pet_portrait_link_title . '</a>';
			}

			$portraits_gallery_link = get_field('portraits_gallery_link');
			if ($portraits_gallery_link) {
				$portraits_gallery_link_url = $portraits_gallery_link['url'];
				$portraits_gallery_link_title = $portraits_gallery_link['title'];
				echo '<a class="hero-cta" href="' . $portraits_gallery_link_url . '">' . $portraits_gallery_link_title . '</a>';
			}

			$earrings_and_artwork_subheading = get_field('earrings_and_artwork_subheading');
			if ($earrings_and_artwork_subheading) {
				echo '<h3 class="earrings_and_artwork_subheading">' . $earrings_and_artwork_subheading . '</h3>';
			}

			$earrings_and_artwork_description = get_field('earrings_and_artwork_description');
			if ($earrings_and_artwork_description) {
				echo '<p class="earrings_and_artwork_description">' . $earrings_and_artwork_description . '</p>';
			}

			$shop_now = get_field('shop_now');
			if ($shop_now) {
				$shop_now_url = $shop_now['url'];
				$shop_now_title = $shop_now['title'];
				echo '<a class="hero-cta" href="' . $shop_now_url . '">' . $shop_now_title . '</a>';
			}

			$get_your_pet_portrait_link = get_field('get_your_pet_portrait_link');
			if ($get_your_pet_portrait_link) {
				$get_your_pet_portrait_link_url = $get_your_pet_portrait_link['url'];
				$get_your_pet_portrait_link_title = $get_your_pet_portrait_link['title'];
				echo '<a class="hero-cta" href="' . $get_your_pet_portrait_link_url . '">' . $get_your_pet_portrait_link_title . '</a>';
			}
		}
		?>
	</section>

	<section class="pet-portraits-gallery">

		<?php
		if (function_exists('get_field')) {
			$pet_portraits_gallery_heading = get_field('pet_portraits_gallery_heading');
			if ($pet_portraits_gallery_heading) {
				echo '<h2 class="pet_portraits_gallery_heading">' . $pet_portraits_gallery_heading . '</h2>';
			}
		}


		$term_slug = 'pet-portrait-images';

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

		if (function_exists('get_field')) {

			$get_your_pet_portrait_link = get_field('get_your_pet_portrait_link');
			if ($get_your_pet_portrait_link) {
				$get_your_pet_portrait_link_url = $get_your_pet_portrait_link['url'];
				$get_your_pet_portrait_link_title = $get_your_pet_portrait_link['title'];
				echo '<a class="hero-cta" href="' . $get_your_pet_portrait_link_url . '">' . $get_your_pet_portrait_link_title . '</a>';
			}


			$shop_now = get_field('shop_now');
			if ($shop_now) {
				$shop_now_url = $shop_now['url'];
				$shop_now_title = $shop_now['title'];
				echo '<a class="hero-cta" href="' . $shop_now_url . '">' . $shop_now_title . '</a>';
			}
		}
		?>
	</section>


</main><!-- #main -->

<?php
get_footer();
