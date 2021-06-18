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

get_header();
?>

<div id="primary">
    <main id="main">
        <div class="content banniere">
            <h1 class="banniere-text">A propos de nous</h1>
            <img class="banniere-img" src="/wp-content/uploads/2021/06/universite-toovalu.jpeg" alt="">
        </div>
        <div class="grid4">
            <div class="">
                <h3 class="color-green"><em>Marie</em></h3>
                <p class="text-center">Directrice générale</p>
            </div>
            <div>
                <img src="/wp-content/uploads/2021/04/70.png" alt="">
            </div>
            <div class="">
                <h3 class="color-green"><em>François</em></h3>
                <p class="text-center">Président de TOOVALU</p>
            </div>
            <div class="grid_fullcell">
                <img src="/wp-content/uploads/2021/06/70.png" alt="">
            </div>
            <div class="grid_fullcell">
                <img src="/wp-content/uploads/2021/06/80.png" alt="">
            </div>
            <div class="">
                <h3 class="color-green"><em>Stéphanie</em></h3>
                <p class="text-center">Adjointe de direction</p>
            </div>
            <div class="grid_fullcell">
                <img src="/wp-content/uploads/2021/06/70.png" alt="">
            </div>
            <div class="">
                <h3 class="color-green"><em>Renate</em></h3>
                <p class="text-center">Business developer RSE</p>
            </div>
            <div class="">
                <h3 class="color-green"><em>Marie-Astrind</em></h3>
                <p class="text-center">Directrice générale</p>
            </div>
            <div>
                <img src="/wp-content/uploads/2021/06/Tracé-147.png" alt="">
            </div>
            <div class="">
                <h3 class="color-green"><em>Quentin</em></h3>
                <p class="text-center">Président de TOOVALU</p>
            </div>
        </div>
        <div class="CSSgal">

            <!-- Don't wrap targets in parent -->
            <s id="s1"></s>
            <s id="s2"></s>
            <s id="s3"></s>
            <s id="s4"></s>

            <div class="slider">
                <h2 class="text-center"><em>L'entreprise</em> Toovalu</h2>
                <p class="text-center ml-15 mr-15 pb-6">Notre nom a été inspiré par l’archipel Tuvalu situé dans l’océan pacifique. Triste <br>
                    symbole du réchauffement climatique avec la conséquence de la montée des eaux.<br>
                    Dans 50 ans, Tuvalu disparaitra si nous n’agissons pas !<br>
                    Les premiers mais pas les derniers, alors agissons !</p>
                <h2 class="text-center pb-4">Une équipe motivée, dynamique<br> et solidaire !</h2>
                <div class="flex-space-around pb-2">
                    <a href="#sales">Sales</a>
                    <a href="#succes">Succes</a>
                    <a href="coordination">Coordination</a>
                    <a href="scrum">Scrum</a>
                </div>
                <div style="background:#85b;">
                    <h2>Slide 2</h2>
                </div>
                <div style="background:#e95;">
                    <h2>Slide 3</h2>
                </div>
                <div style="background:#e59;">
                    <h2>Slide 4</h2>
                </div>
            </div>

            <div class="prevNext">
                <div><a href="#s4"></a><a href="#s2"></a></div>
                <div><a href="#s1"></a><a href="#s3"></a></div>
                <div><a href="#s2"></a><a href="#s4"></a></div>
                <div><a href="#s3"></a><a href="#s1"></a></div>
            </div>

            <div class="bullets">
                <a href="#s1">1</a>
                <a href="#s2">2</a>
                <a href="#s3">3</a>
                <a href="#s4">4</a>
            </div>

        </div>
        <div class="bg-green">
            <h2 class="text-center"><em>10 ans</em> d'histoire</h2>
        </div>
        <div class="grid2 pb-6">
            <div class="">
                <h3 class="text-center mt-15">Notre <em>organisation</em></h3>
                <p class="text-center">Epicurus in armatum hostem impetum fecisse aut odit aut odit aut ad modum, quaeso, interpretaris? Consectum lorems dolor sit manet consectum lorem tuplal kkge sicine eos censes tantas. Lorem ipsum dolor sit amnet consectum libris set.</p>
            </div>
            <div class="grid_fullcell">
                <img src="/wp-content/uploads/2021/06/70.png" alt="">
            </div>
            <div class="grid_fullcell">
                <img src="/wp-content/uploads/2021/06/abeille.png" alt="">
            </div>
            <div class="">
                <h3 class="text-center mt-15">Nos <em>valeurs</em></h3>
                <p class="text-center">Epicurus in armatum hostem impetum fecisse aut odit aut odit aut ad modum, quaeso, interpretaris? Consectum lorems dolor sit manet consectum lorem tuplal kkge sicine eos censes tantas. Lorem ipsum dolor sit amnet consectum libris set.</p>
            </div>
            <div class="">
                <h3 class="text-center mt-15">Nos <em>certifications</em></h3>
                <p class="text-center">Epicurus in armatum hostem impetum fecisse aut odit aut odit aut ad modum, quaeso, interpretaris? Consectum lorems dolor sit manet consectum lorem tuplal kkge sicine eos censes tantas. Lorem ipsum dolor sit amnet consectum libris set.</p>
<!--                <p class="pt-2 bt-2 text-center"><a href="#" class="btn btn--green">Découvrir notre écostystème</a></p>-->
            </div>
            <div class="grid_fullcell">
                <img src="/wp-content/uploads/2021/06/70.png" alt="">
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
