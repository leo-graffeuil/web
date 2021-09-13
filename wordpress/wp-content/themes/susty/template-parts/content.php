<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Susty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="content">
		<div class="container">
			<?php
			if ('post' === get_post_type()) :
			?>
				<div class="entry-meta">
					<?php
					//susty_wp_posted_on();
					//susty_wp_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif;
			if (is_singular()) :
				the_title('<h1>', '</h1>');
			else :
				the_title('<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif; ?>
		</div>
	</header>

	<?php // susty_wp_post_thumbnail(); 
	?>


	<div class="content">
		<div class="container">
			<div class="sharing">
				<span class="text">Partager l'article</span>
				<a href="#" class="icon"><span class="dashicons dashicons-email"></span></a>
				<a href="#" class="icon"><span class="dashicons dashicons-linkedin"></span></a>
				<a href="#" class="icon"><span class="dashicons dashicons-twitter"></span></a>
				<a href="#" class="icon"><span class="dashicons dashicons-facebook-alt"></span></a>
			</div>
			<?php
			the_content(sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'susty'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			));

			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'susty'),
				'after'  => '</div>',
			));
			?>
			<?php susty_wp_entry_footer(); ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->