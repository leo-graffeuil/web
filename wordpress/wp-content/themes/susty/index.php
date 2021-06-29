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

<div id="blog">
        <section class="our-blog">
            <div class="container-blog">
                <div class="text-center">
            <h2 class="text-center">Retrouvez tous nos <em>conseils</em><br>
                pratiques, et nos <em>convictions</em></h2>
            <p class="text-center"></p>
                </div>
            </div>

       <?php if (have_posts()) : while (have_posts()) :
            the_post(); ?>

            <div class="row-blog mt-5r">
                <div class="col-blog">
                    <div class="card">
                    <div class="mr-15"<?php the_post_thumbnail(); ?></div>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail();
                }
                ?>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php the_title(); ?>
                        </h5>
                        <p class="date-author">
                            <?php the_time('j F Y'); ?>
                        </p>
                        <p class="card-text">
                        <?php the_excerpt(); ?>
                        </p>
                        <div class="pt-2">
                        <a href="<?php the_permalink(); ?>" class="btn">Lire la suite</a>
                        </div>
                    </div>
                </div>
            </div>

       <?php endwhile;
       endif; ?>
        </section>
</div>
<?php get_footer(); ?>
