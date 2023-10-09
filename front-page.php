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
					// echo '<p>' . $welcome_message . '</p>';
					echo $welcome_message;
				}
			?>
				<div class="cta-container">

					<?php

					$shop_now_cta = get_field('hero_section')['shop_now_cta'];
					if ($shop_now_cta) {
						$shop_now_cta_url = $shop_now_cta['url'];
						$shop_now_cta_title = $shop_now_cta['title'];
						// var_dump($shop_now_cta_title);
						echo '<a class="shop-now-cta button" href="' . $shop_now_cta_url . '">' . $shop_now_cta_title . '</a>';
					}
					$custom_orders_cta = get_field('hero_section')['custom_orders_cta'];
					if ($custom_orders_cta) {
						$custom_orders_cta_url = $custom_orders_cta['url'];
						$custom_orders_cta_title = $custom_orders_cta['title'];
						echo '<a class="custom-orders-cta button" href="' . $custom_orders_cta_url . '">' . $custom_orders_cta_title . '</a>';
					}
					?>
				</div>

			<?php
			}

			// echo do_shortcode('[metaslider id="685"]');


			?>
		</section>

		<section class="description-art-section">
			<?php
			if (function_exists('get_field')) {

				//Pet Portraits Description
				$pet_portrait_featured_image = get_field('description_section')['pet_portrait_featured_image'];

				echo '<div class="art-type-box" data-aos="fade-up">';
				if ($pet_portrait_featured_image && isset($pet_portrait_featured_image['url'])) {
					echo '<img src="' . esc_url($pet_portrait_featured_image['url']) . '" alt="Pet Portrait Featured Image">';
				}

				$pet_portrait_heading = get_field('description_section')['pet_portrait_heading'];
				if ($pet_portrait_heading) {
					echo '<h2>' . $pet_portrait_heading . '</h2>';
				}

				$pet_portrait_text = get_field('description_section')['pet_portrait_text'];
				if ($pet_portrait_text) {
					echo '<p class="text-description">' . $pet_portrait_text . '</p>';
				}

				echo '</div>';


				//Earrings Description
				echo '<div class="art-type-box" data-aos="fade-up">';
				$earrings_featured_image = get_field('description_section')['earrings_featured_image'];
				if ($earrings_featured_image && isset($earrings_featured_image['url'])) {
					echo '<div class="earrings-img-box">';

					echo '<img src="' . esc_url($earrings_featured_image['url']) . '" alt="Earrings Featured Image">';
					echo '</div>';
				}

				$earrings_heading = get_field('description_section')['earrings_heading'];
				if ($earrings_heading) {
					echo '<h2>' . $earrings_heading . '</h2>';
				}

				$earrings_text = get_field('description_section')['earrings_text'];
				if ($earrings_text) {
					echo '<p class="text-description">' . $earrings_text . '</p>';
				}
				echo '</div>';

				//Other Artowrk Description
				echo '<div class="art-type-box dynamic-paperartwork" data-aos="fade-up">';
				$artwork_featured_image = get_field('description_section')['artwork_featured_image'];
				if ($artwork_featured_image && isset($artwork_featured_image['url'])) {
					echo '<img src="' . esc_url($artwork_featured_image['url']) . '" alt="Artwork Featured Image">';
				}

				$artwork_heading = get_field('description_section')['artwork_heading'];
				if ($artwork_heading) {
					echo '<h2>' . $artwork_heading . '</h2>';
				}
				echo '<div class="dynamic-paper-art-description">';

				//Landscapes

			?>
				<article class="description-art-container">
					<div class="description-art-title-box">


						<?php
						$landscape_svg = get_field('description_section')['landscape_svg'];
						if ($landscape_svg) {
							echo '<div>' . $landscape_svg . '</div>';
						}

						$landscape_subheading = get_field('description_section')['landscape_subheading'];
						if ($landscape_subheading) {
							echo '<h3 class="art-description-subheading">' . $landscape_subheading . '</h3>';
						}

						?>
					</div>
					<?php


					$landscape_text = get_field('description_section')['landscape_text'];
					if ($landscape_text) {
						echo '<p>' . $landscape_text . '</p>';
					}


					//Floral

					?>
				</article>

				<article class="description-art-container">
					<div class="description-art-title-box">


						<?php
						$floral_svg = get_field('description_section')['floral_svg'];
						if ($floral_svg) {
							echo '<div>' . $floral_svg . '</div>';
						}

						$floral_art_subheading = get_field('description_section')['floral_art_subheading'];
						if ($floral_art_subheading) {
							echo '<h3 class="art-description-subheading">' . $floral_art_subheading . '</h3>';
						}

						?>
					</div>

					<?php

					$floral_art_text = get_field('description_section')['floral_art_text'];
					if ($floral_art_text) {
						echo '<p>' . $floral_art_text . '</p>';
					}


					//Ornaments

					?>
				</article>
				<article class="description-art-container">
					<div class="description-art-title-box">


						<?php

						$ornaments_svg = get_field('description_section')['ornaments_svg'];
						if ($ornaments_svg) {
							echo '<div>' . $ornaments_svg . '</div>';
						}

						$ornaments_subheading = get_field('description_section')['ornaments_subheading'];
						if ($ornaments_subheading) {
							echo '<h3 class="art-description-subheading">' . $ornaments_subheading . '</h3>';
						}

						?>
					</div>
					<?php
					$ornaments_text = get_field('description_section')['ornaments_text'];
					if ($ornaments_text) {
						echo '<p>' . $ornaments_text . '</p>';
					}


					//Commissions

					?>
				</article>
				<article class="description-art-container">
					<div class="description-art-title-box">


						<?php

						$commissions_svg = get_field('description_section')['commissions_svg'];
						if ($commissions_svg) {
							echo '<div>' . $commissions_svg . '</div>';
						}

						$commissions_subheading = get_field('description_section')['commissions_subheading'];
						if ($commissions_subheading) {
							echo '<h3 class="art-description-subheading">' . $commissions_subheading . '</h3>';
						}

						?>
					</div>
					<?php

					$commissions_text = get_field('description_section')['commisssions_text'];
					if ($commissions_text) {
						echo '<p>' . $commissions_text . '</p>';
					}
					?>
				</article>
				<div class="cta-container">

				<?php

				$shop_now_cta = get_field('description_section')['shop_now_cta'];
				if ($shop_now_cta) {
					$shop_now_cta_url = $shop_now_cta['url'];
					$shop_now_cta_title = $shop_now_cta['title'];
					// var_dump($shop_now_cta_title);
					echo '<a class="shop-now-cta button" href="' . $shop_now_cta_url . '">' . $shop_now_cta_title . '</a>';
				}
				$custom_orders_cta = get_field('description_section')['custom_order_cta'];
				if ($custom_orders_cta) {
					$custom_orders_cta_url = $custom_orders_cta['url'];
					$custom_orders_cta_title = $custom_orders_cta['title'];
					echo '<a class="custom-orders-cta button" href="' . $custom_orders_cta_url . '">' . $custom_orders_cta_title . '</a>';
				}
			}
				?>
				</div>

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
						echo '<div class="gallery-item" data-aos="fade-up">';
						echo '<img src="' . $thumbnail_url[0] . '" alt="Larger Image">';
						echo '</div>';
					}
				}
				echo '</div>';
				wp_reset_postdata();
			}
			?>
		</section>



		<section class="faq-section" id="faq">

			<?php
			if (function_exists('get_field')) {
				$faq_section = get_field('faq_section');

				$faq_heading = $faq_section['faq_heading'];
				if ($faq_heading) {
					echo '<h2>' . $faq_heading . '</h2>';
				}

				echo '<div class="faq-container">'; // Start wrapping div container

				for ($i = 1; $i <= 5; $i++) {
					echo '<article class="faq-box">';
					echo '<div class="faq-heading-box faq-box-' . $i . '">';

					$question_svg = $faq_section['question' . $i . '_svg'];
					if ($question_svg) {
						echo $question_svg;
					}

					$question_heading = $faq_section['question' . $i . '_heading'];
					if ($question_heading) {
						echo '<h3>' . $question_heading . '</h3>';
					}

					echo '</div>';


					$question_text = $faq_section['question' . $i . '_text'];
					if ($question_text) {
						// Check if it's the last question and avoid wrapping in a <p> tag
						if ($i === 5) {
							echo $question_text;
						} else {
							echo '<p>' . $question_text . '</p>';
							echo '</article>';
						}
					}
				}

				echo '</div>'; // End wrapping div container
			}
			?>

			<?php

			if (function_exists('get_field')) {

				$hero_heading = get_field('hero_section')['hero_heading'];
			?>
				<div class="cta-container">

					<?php

					$shop_now_cta = get_field('hero_section')['shop_now_cta'];
					if ($shop_now_cta) {
						$shop_now_cta_url = $shop_now_cta['url'];
						$shop_now_cta_title = $shop_now_cta['title'];
						// var_dump($shop_now_cta_title);
						echo '<a class="shop-now-cta button" href="' . $shop_now_cta_url . '">' . $shop_now_cta_title . '</a>';
					}
					$custom_orders_cta = get_field('hero_section')['custom_orders_cta'];
					if ($custom_orders_cta) {
						$custom_orders_cta_url = $custom_orders_cta['url'];
						$custom_orders_cta_title = $custom_orders_cta['title'];
						echo '<a class="custom-orders-cta button" href="' . $custom_orders_cta_url . '">' . $custom_orders_cta_title . '</a>';
					}
					?>
				</div>
		</section>

<?php
			}




		endwhile; ?>
</main>

<?php
get_footer();
?>