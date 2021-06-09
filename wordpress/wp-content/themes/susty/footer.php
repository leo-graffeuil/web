<?php

/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */
?>

</div>

<footer>
    <div id="contactForm" class="content">
        <div class="container">
            <form action="">
                <input type="email" placeholder="Je m'abonne à la newsletter" id="email">
                <button type="submit">Je m'abonne</button>
            </form>
        </div>
    </div>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-4',
        'menu_id'        => 'secondary-menu',
    ));
    ?>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>