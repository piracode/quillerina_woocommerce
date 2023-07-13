<?php
/*
Template Name: Gallery
Template Post Type: page

* Custom template for displaying the Gallery page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quillerina-theme
*/

get_header();
?>
<main id="primary" class="site-main">
	<section class="section-gallery-intro">

		<?php
		if (function_exists('get_field')) {
			$back_home_page_svg = get_field('back_to_home_page_svg');
			if ($back_home_page_svg) {
				echo $back_home_page_svg;
			}

			$back_home_link = get_field('back_to_home_page_link');
			if ($back_home_link) {
				$back_home_link_url = $back_home_link['url'];
				$back_home_link_title = $back_home_link['title'];
				echo '<a class="hero-cta" href="' . $back_home_link_url . '">' . $back_home_link_title . '</a>';
			}

			$gallery_section_heading = get_field('gallery_section_heading');
			if ($gallery_section_heading) {
				echo '<h2 class="gallery_section_heading">' . $gallery_section_heading . '</h2>';
			}

			$gallery_section_text = get_field('gallery_section_text');
			if ($gallery_section_text) {
				echo '<p class="gallery_section_text">' . $gallery_section_text . '</p>';
			}
		}
		?>
	</section>

	<section class="entire-gallery">

		<?php
		if (function_exists('get_field')) {
			$pet_portraits_gallery_heading = get_field('pet_portraits_gallery_heading');
			if ($pet_portraits_gallery_heading) {
				echo '<h2 class="pet_portraits_gallery_heading">' . $pet_portraits_gallery_heading . '</h2>';
			}
		}


		$term_slug = 'all-images';

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



</main><!-- #main -->

<?php
get_footer();
