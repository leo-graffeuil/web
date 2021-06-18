<?php

/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'susty'); ?></a>

		<header id="masthead">
			<div class="logo">
				<?php
				if (has_custom_logo()) :
					the_custom_logo();
				else :
				?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img alt="Susty WP logo" src="<?php echo esc_url(get_template_directory_uri() . '/images/eco-chat.svg'); ?>"><span class="screen-reader-text"><?php esc_html_e('Home', 'susty'); ?></span></a>
				<?php
				endif;
				?>
			</div>

			<?php
			wp_nav_menu(array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			));
			?>
		</header>

		<div id="content">