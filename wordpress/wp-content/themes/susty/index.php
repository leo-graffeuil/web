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

<div id="primary">
    <main id="main">
        <div class="pb-6">
            <h2 class="text-center">Retrouvez tous nos <em>conseils</em><br>
                pratiques, et nos <em>convictions</em></h2>
            <p class="text-center"></p>
        </div>
       <?php if (have_posts()) : while (have_posts()) :
            the_post(); ?>

            <article class="">
                <div class="flex-center flex-align-items">
                    <div class="mr-15"<?php the_post_thumbnail(); ?></div>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail();
                }
                ?>
                <div class="pt-2 pb-4 mr-15rem ml-10rem">
                    <p>
                        Publié le <?php the_time('j F Y'); ?>
                    </p>
                    <h3 class="mb-4"><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                    <div class="mb-4">
                    <a href="<?php the_permalink(); ?>" class="btn">Lire la suite</a>
                    </div>
                </div>
            </article>

       <?php endwhile;
        endif; ?>
    </main>
</div>
<?php get_footer(); ?>
