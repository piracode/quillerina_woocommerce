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
		<button class="menu-toggle" aria-controls="footer-menu" aria-expanded="false"><?php esc_html_e('Footer Menu', 'quillerina-theme'); ?></button>
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
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>