<?php
/**
 * The main template file
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Susty
 */

get_header();
?>


<?php echo do_shortcode("[display-posts  posts_per_page=1000 include_date=true order=DESC include_excerpt=true image_size=thumbnail-medium wrapper=div wrapper_class=display-posts-listing image-left]"); ?>

<?php get_footer(); ?>
