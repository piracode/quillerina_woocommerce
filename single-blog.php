<?php
/*
Template Name: Blog
Template Post Type: page

* Custom template for displaying the Blog page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quillerina-theme
*/

get_header();
?>
<main id="primary" class="site-main">


	<section class="section-blog">
		<?php
		$args = array(
			'post_type' => 'blog', // Replace 'your_cpt_slug' with the actual slug of your custom post type
			'posts_per_page' => -1,
		);
		$query = new WP_Query($args);

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$blog_image = get_field('blog_image');
				if ($blog_image) {
					$image_url = $blog_image['url'];
					$image_alt = $blog_image['alt'];
					echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
				}


				$blog_title = get_field('blog_tilte');
				if ($blog_title) {
					echo '<h2 class="blog_title">' . $blog_title . '</h2>';
				}

				$blog_text = get_field('blog_text');
				if ($blog_text) {
					echo '<p class="blog_text">' . $blog_text . '</p>';
				}

				$blog_link = get_field('blog_link');
				if ($blog_link) {
					$blog_link_url = $blog_link['url'];
					$blog_link_title = $blog_link['title'];
					echo '<a class="hero-cta" href="' . $blog_link_url . '">' . $blog_link_title . '</a>';
				}
			}

			wp_reset_postdata(); // Reset the post data
		}
		?>
	</section>



</main><!-- #main -->

<?php
get_footer();
