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
	<link rel="profile" href="https://gmpg.org/xfn/11">

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

            <div id="menu-toggler">
                <a href="#">
                    <span class="fa fa-bars fa-2x menu-principal-toggler-icons"></span>
                    <span class="fa fa-times fa-2x menu-principal-toggler-icons hidden"></span>
                </a>
            </div>

            <script type="text/javascript">
                const handleMenuToggler = (e) => {
                    e.preventDefault()
                    let mainMenu = document.getElementsByClassName('menu-principal-container')[0];
                    mainMenu.classList.toggle('active')
                    let handleIcons = document.getElementsByClassName('menu-principal-toggler-icons');
                    for (let i = 0; i < handleIcons.length; i++) {
                        handleIcons[i].classList.toggle('hidden')
                    }
                }
                document.getElementById("menu-toggler").addEventListener("click", handleMenuToggler);
            </script>
			<?php
			wp_nav_menu(array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			));
			?>
		</header>

		<div id="content">