<?php
/*
Template Name: About
Template Post Type: page

* Custom template for displaying the About page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quillerina-theme
*/

get_header();
?>
<main id="primary" class="site-main">
	<section class="section-about">

		<?php
		if (function_exists('get_field')) {


			$about_page_heading = get_field('about_page_heading');
			if ($about_page_heading) {
				echo '<h2 class="about_page_heading">' . $about_page_heading . '</h2>';
			}

			$about_page_subheading = get_field('about_page_subheading');
			if ($about_page_subheading) {
				echo '<h3 class="about_page_subheading">' . $about_page_subheading . '</h3>';
			}

			$about_me_text = get_field('about_me_text');
			if ($about_me_text) {
				echo '<p class="about_me_text">' . $about_me_text . '</p>';
			}

		?>
			<div class="cta-container">

				<?php

				$shop_now_link = get_field('shop_now_link');
				if ($shop_now_link) {
					$shop_now_link_url = $shop_now_link['url'];
					$shop_now_link_title = $shop_now_link['title'];
					echo '<a class="shop-now-cta button" href="' . $shop_now_link_url . '">' . $shop_now_link_title . '</a>';
				}

				$gallery_link = get_field('gallery_link');
				if ($gallery_link) {
					$gallery_link_url = $gallery_link['url'];
					$gallery_link_title = $gallery_link['title'];
					echo '<a class="custom-orders-cta button" href="' . $gallery_link_url . '">' . $gallery_link_title . '</a>';
				}
				?>

			</div>
		<?php

			$contact_us_heading = get_field('contact_us_heading');
			if ($contact_us_heading) {
				echo '<h2 class="contact_us_heading">' . $contact_us_heading . '</h2>';
			}

			$contact_email = get_field('contact_email');
			if ($contact_email) {
				$contact_us_text = get_field('contact_us_text');
				if ($contact_us_text) {
					echo '<p class="contact_us_text">' . $contact_us_text . ' <a href="mailto:' . $contact_email . '">' . $contact_email . '</a></p>';
				}
			}
		}
		?>
	</section>



</main><!-- #main -->

<?php
get_footer();
