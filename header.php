<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quillerina-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'quillerina-theme'); ?></a>
		<div class="site-heading-container">
			<div class="header-line-above" aria-hidden="true">&nbsp;</div>
			<header id="masthead" class="site-header">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					else :
					?>
						<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
					endif;
					$quillerina_theme_description = get_bloginfo('description', 'display');
					if ($quillerina_theme_description || is_customize_preview()) :
					?>
						<p class="site-description"><?php echo $quillerina_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="menu-toggle-icon menu-open-icon" aria-label="Open Menu">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<title>Menu Open Icon</title>
								<path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" />
							</svg>
						</span>
						<span class="menu-toggle-icon menu-close-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-label="Close Menu">
								<title>Menu Close Icon</title>
								<path d="M23 20.168l-8.185-8.187 8.185-8.174-2.832-2.807-8.182 8.179-8.176-8.179-2.81 2.81 8.186 8.196-8.186 8.184 2.81 2.81 8.203-8.192 8.18 8.192z" />
							</svg>
						</span>
					</button>
					<?php
					// Display the primary menu
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #primary-navigation -->

				<nav id="secondary-navigation" class="secondary-navigation">
					<!-- Header Secondary Menu -->
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header-secondary-menu',
							'menu_id'        => 'header-secondary-menu',
						)
					);
					?>
				</nav><!-- #secondary-navigation -->
			</header><!-- #masthead -->
			<div class="header-line-below" aria-hidden="true">&nbsp;</div>
		</div>