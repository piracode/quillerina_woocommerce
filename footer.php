<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quillerina-theme
 */

?>
<footer id="colophon" class="site-footer">
	<nav id="site-navigation" class="footer-navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer-menu',
				'menu_id'        => 'footer-menu',
			)
		);
		?>
	</nav><!-- #site-navigation -->
	<div class="site-info">
		<p>&copy; <?php echo date('Y'); ?> <?php echo esc_html__('Quillerina Paper Art 2023', 'your-text-domain'); ?></p>
		<p>Website by <a href="https://martha.codes" target='_blank' rel='noopener noreferrer'>Martha Villa Martin</a></p>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>