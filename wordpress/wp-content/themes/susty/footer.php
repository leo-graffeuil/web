<?php

/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */
?>
<div>
<footer>
    <section id="newsletter" class="content">
        <div class="container">
            <form id="newsletter-form" data-netlify="true">
                <input type="email" name="email" placeholder="Je donne mon email pour recevoir la newsletter">
                <button type="submit" class="btn btn--blue">Je m'abonne</button>
            </form>
        </div>
    </section>

    <script type="text/javascript">
        const handleNewsletterFormSubmit = (e) => {
            e.preventDefault()
            let newsletterForm = document.getElementById('newsletter-form');
            let formData = new FormData(newsletterForm)
            fetch('/', {
                method: 'POST',
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams(formData).toString()
            }).then(
                () => {
                    newsletterForm.outerHTML =
                        "<div>" +
                        "<p><strong>Merci 🎉<strong></p>" +
                        "Votre demande a bien été enregistrée !" +
                        "</div>"
                }
            ).catch((error) =>
                alert("Une erreur s'est produite, merci de réessayer dans quelques instants")
            )
        }
        document.getElementById("newsletter-form").addEventListener("submit", handleNewsletterFormSubmit);
    </script>

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
                <li><a href="https://www.youtube.com/channel/UCNDVj-pdNZVUNekZ-RiW7AA" class="icon"><span class="fa fa-youtube"></span></a></li>
                <li><a href="https://www.linkedin.com/company/toovalu-sas/?originalSubdomain=fr" class="icon"><span class="fa fa-linkedin"></span></a></li>
                <li><a href="https://twitter.com/toovalurse?lang=fr" class="icon"><span class="fa fa-twitter"></span></a></li>
            </ul>
        </div>
        <div class="col">
            <img id="footer_logo" src="<?php echo get_template_directory_uri(); ?>/images/toovalu-logo-footer.png" alt="logo Toovalu">
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>