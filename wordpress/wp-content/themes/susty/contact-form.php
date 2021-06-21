<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Susty
 */


//If the form is submitted
if (isset($_POST['submitted'])) {
    //Check to see if the honeypot captcha field was filled in
    if (trim($_POST['checking']) !== '') {
        $captchaError = true;
    } else {
        //Check to make sure that the name field is not empty
        if (trim($_POST['contactName']) === '') {
            $nameError = 'Indiquez le nom de votre entreprise';
            $hasError = true;
        } else {
            $name = trim($_POST['contactName']);
        }

        //Check to make sure sure that a valid email address is submitted
        if (trim($_POST['email']) === '') {
            $emailError = 'Indiquez une adresse e-mail valide.';
            $hasError = true;
        } else if (!preg_match("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
            $emailError = 'Adresse e-mail invalide.';
            $hasError = true;
        } else {
            $email = trim($_POST['email']);
        }

        //If there is no error, send the email
        if (!isset($hasError)) {
            $emailTo = 'a.sparesotto@icloud.com';
            $subject = 'Formulaire de contact de ' . $name;
            $rgpd = trim($_POST['rgpd']);
            $body = "Name: $name \n\nEmail: $email \n\n";
            $headers = 'De : mon site <' . $emailTo . '>' . "\r\n" . 'R&eacute;pondre &agrave; : ' . $email;

            mail($emailTo, $subject, $body, $headers);

            $emailSent = true;
        }
    }
}
get_header();
?>
<?php get_template_part('template-parts/content', 'page'); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>../scripts/contact-form.js"></script>

<div id="primary">
    <main id="main demoPage">
        <h2 class="text-center">Je fait <em>ma demande !</em></h2>

        <?php if (isset($emailSent) && $emailSent == true) { ?>

            <div class="thanks">
                <h1>Merci, <?= $name; ?></h1>
                <p>Votre e-mail a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s. Vous recevrez une r&eacute;ponse sous peu.</p>
            </div>

        <?php } else { ?>

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>

                    <?php if (isset($hasError) || isset($captchaError)) { ?>
                        <p class="error">Une erreur est survenue lors de l'envoi du formulaire.</p>
                    <?php } ?>

                    <form action="<?php the_permalink(); ?>" id="demoForm" method="post">

                        <ol class="formsDemo">
                            <li class="alignleft"><label for="contactName">Société*</label>
                                <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName'])) echo $_POST['contactName']; ?>" class="requiredField background" />
                                <?php if ($nameError != '') { ?>
                                    <span class="error"><?= $nameError; ?></span>
                                <?php } ?>
                            </li>
                            <li class="alignright"><label for="email">E-mail*</label>
                                <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" class="requiredField email background" />
                                <?php if ($emailError != '') { ?>
                                    <span class="error"><?= $emailError; ?></span>
                                <?php } ?>
                            </li>
                        </ol>
                        <ol class="footerForm">
                            <li class="inline"><input class="rgpd" type="checkbox" name="rgpd" id="rgpd" value="true" <?php if (isset($_POST['rgpd']) && $_POST['rgpd'] == true) echo ' checked="checked"'; ?> /><label for="rgpd">J'accepte que mes données soient conservées pour être contacté*</label></li>
                            <li>* Champs obligatoires</li><br>
                            <li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit" class="button btn--green aligncenter">Recevoir l'accès à la démo</button></li>
                        </ol>
                    </form>

                <?php endwhile; ?>
            <?php endif; ?>
        <?php } ?>

        <div class="aligncenter">
            <h2 class="text-center">Écrivez-nous</h2>
            <p class="text-center">Faites nous part de votre demande, nous vous répondrons dans les plus brefs délais</p>
        </div> <?php
                //If the form is submitted
                if (isset($_POST['submitted'])) {

                    //Check to see if the honeypot captcha field was filled in
                    if (trim($_POST['checking']) !== '') {
                        $captchaError = true;
                    } else {

                        //Check to make sure that the name field is not empty
                        if (trim($_POST['contactName']) === '') {
                            $nameError = 'Indiquez votre nom.';
                            $hasError = true;
                        } else {
                            $name = trim($_POST['contactName']);
                        }

                        //Check to make sure that the last name field is not empty
                        if (trim($_POST['contactLastName']) === '') {
                            $lastNameError = 'Indiquez votre prénom.';
                            $hasError = true;
                        } else {
                            $lastName = trim($_POST['contactLastName']);
                        }

                        //Check to make sure sure that a valid email address is submitted
                        if (trim($_POST['email']) === '') {
                            $emailError = 'Indiquez une adresse e-mail valide.';
                            $hasError = true;
                        } else if (!preg_match("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
                            $emailError = 'Adresse e-mail invalide.';
                            $hasError = true;
                        } else {
                            $email = trim($_POST['email']);
                        }

                        //Check to make sure sure that a valid phone number  is submitted
                        if (trim($_POST['contactPhone']) === '') {
                            $phoneError = 'Indiquez un numéro de téléphone valide.';
                            $hasError = true;
                        } else if (!preg_match("^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$", trim($_POST['contactPhone']))) {
                            $phoneError = 'Numéro de téléphone invalide.';
                            $hasError = true;
                        } else {
                            $phone = trim($_POST['contactPhone']);
                        }

                        //Check to make sure comments were entered
                        if (trim($_POST['comments']) === '') {
                            $commentError = 'Entrez votre message.';
                            $hasError = true;
                        } else {
                            if (function_exists('stripslashes')) {
                                $comments = stripslashes(trim($_POST['comments']));
                            } else {
                                $comments = trim($_POST['comments']);
                            }
                        }

                        //If there is no error, send the email
                        if (!isset($hasError)) {

                            $emailTo = 'a.sparesotto@icloud.com';
                            $subject = 'Formulaire de contact de ' . $name;
                            $rgpd = trim($_POST['rgpd']);
                            $body = "Name: $name \n\nEmail: $email \n\nComments: \n\n$lastName LastName: $lastName \n\n$phone phone: $phone";
                            $headers = 'De : mon site <' . $emailTo . '>' . "\r\n" . 'R&eacute;pondre &agrave; : ' . $email;

                            mail($emailTo, $subject, $body, $headers);

                            $emailSent = true;
                        }
                    }
                } ?>



        <?php if (isset($emailSent) && $emailSent == true) { ?>

            <div class="thanks">
                <h1>Merci, <?= $name; ?></h1>
                <p>Votre e-mail a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s. Vous recevrez une r&eacute;ponse sous peu.</p>
            </div>

        <?php } else { ?>

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>

                    <?php if (isset($hasError) || isset($captchaError)) { ?>
                        <p class="error">Une erreur est survenue lors de l'envoi du formulaire.</p>
                    <?php } ?>

                    <form action="<?php the_permalink(); ?>" id="formContact" method="post">
                        <div class="">
                            <div class="clear flex-space-around">
                                <div class=""><label class="block" for="contactName">Nom*</label>
                                    <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName'])) echo $_POST['contactName']; ?>" class="requiredField background" />
                                    <?php if ($nameError != '') { ?>
                                        <span class="error"><?= $nameError; ?></span>
                                    <?php } ?>
                                </div>
                                <div class="">
                                    <label class="block" for="contactLastName">Prénom*</label>
                                    <input type="text" name="contactLastName" id="contactLastName" value="<?php if (isset($_POST['contactLastName'])) echo $_POST['contactLastName']; ?>" class="requiredField background" />
                                    <?php if ($lastNameError != '') { ?>
                                        <span class="error"><?= $lastNameError; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="clear flex-space-around">
                                <div class=""><label class="block" for="email">E-mail*</label>
                                    <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" class="requiredField email background" />
                                    <?php if ($emailError != '') { ?>
                                        <span class="error"><?= $emailError; ?></span>
                                    <?php } ?>
                                </div>
                                <div class=""><label class="block" for="contactPhone">Téléphone*</label>
                                    <input type="number" name="contactPhone" id="contactPhone" value="<?php if (isset($_POST['contactPhone'])) echo $_POST['contactPhone']; ?>" class="requiredField background" />
                                    <?php if ($phoneError != '') { ?>
                                        <span class="error"><?= $phoneError; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="textarea pb-2"><label class="block" for="commentsText">Votre demande*</label>
                                <textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField background"><?php if (isset($_POST['comments'])) {
                                                                                                                                        if (function_exists('stripslashes')) {
                                                                                                                                            echo stripslashes($_POST['comments']);
                                                                                                                                        } else {
                                                                                                                                            echo $_POST['comments'];
                                                                                                                                        }
                                                                                                                                    } ?></textarea>
                                <?php if ($commentError != '') { ?>
                                    <span class="error"><?= $commentError; ?></span>
                                <?php } ?>
                            </div>
                            <div class="footerForm">
                                <div class="inline pb-2"><input class="rgpd" type="checkbox" name="rgpd" id="rgpd" value="true" <?php if (isset($_POST['rgpd']) && $_POST['rgpd'] == true) echo ' checked="checked"'; ?> /><label for="rgpd">J'accepte que mes données soient conservées pour être contacté*</contacté></label></div>
                                <p>*Champs obligatoires</p>
                                <div class="buttons pb-4"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit" class="button btn--green aligncenter">Envoyer ma demande</button></div>
                            </div>
                    </form>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php } ?>
        <div class="grid2">
            <div class="grid_fullcell bg-yellow">
                <h3 class="aligncenter">Toovalu Nantes</h3>
                <p class="aligncenter">c/o Groupe KERAN </p>
                <p class="aligncenter">4 rue René Viviani </p>
                <p class="aligncenter">44 200 Nantes</p>
                <p class="aligncenter"><span class="fa fa-envelope">contact@toovalu.com</span></p>
                <p class="aligncenter"><span class="fa fa-phone">02 51 17 81 80</span></p>
            </div>
            <div>
                <img src="/wp-content/uploads/2021/06/Map_leaflet_Esri_worldGrayCanvas.png" alt="">
            </div>
            <div>
            </div>
        </div>
    </main><!-- #main -->

</div><!-- #primary -->


<?php
get_footer();
