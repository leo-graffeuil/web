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

    <div id="subfooter">
        <div class="col col-2">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-2',
                'menu_id'        => 'footer-menu',
            ));
            ?>
            <p id="footer_legal">&copy;2021 TOOVALU - &copy; Crédit photo Charlotte Goislot</p>
        </div>
        <div class="col">
            <ul id="footer_sharing">
                <li><a href="#" class="icon"><span class="dashicons dashicons-facebook-alt"></span></a></li>
                <li><a href="#" class="icon"><span class="dashicons dashicons-linkedin"></span></a></li>
                <li><a href="#" class="icon"><span class="dashicons dashicons-twitter"></span></a></li>
            </ul>
        </div>
        <div class="col">
            <img id="footer_logo" src="<?php echo get_template_directory_uri(); ?>/images/Toovalu_footer.png" alt="logo Toovalu">
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>