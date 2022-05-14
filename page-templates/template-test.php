<?php
/**
 * Template Name: Szablon testowy
 */

get_header(); ?>


<?php
if (have_posts()):
    while (have_posts()):
        the_post();
        ?>

        <section class="section">
            <div class="container">
                <h1 class="h1">Heading 1</h1>
                <h1 class="h1"><strong>Heading 1 - strong</strong></h1>

                <h2 class="h2">Heading 2</h2>
                <h2 class="h2"><strong>Heading 2 - strong</strong></h2>

                <h3 class="h3">Heading 3</h3>
                <h3 class="h3"><strong>Heading 3 - strong</strong></h3>

                <h4 class="h4">Heading 4</h4>
                <h4 class="h4"><strong>Heading 4 - strong</strong></h4>
                <div class="row-flex">
                    <a class="btn1" href="#">btn cta 1</a>
                    <a class="btn2" href="#">btn cta 2</a>
                    <a class="btn3" href="#">btn cta 3</a>
                    <a class="btn-cookies" href="#">Close</a>
                </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit eros sem, at luctus
                    mauris
                    scelerisque eget. Pellentesque rutrum volutpat orci nec malesuada. Lorem ipsum dolor sit
                    amet,
                    consectetur adipiscing elit. Sed blandit eros sem,</p>
                <p>
                    <a href="#">some link</a> at luctus mauris scelerisque eget. Pellentesque rutrum volutpat
                    orci
                    nec
                    malesuada.</p>


                <h2 class="h2">Custom list</h2>
                <ul class="custom-list">
                    <li>Lorem something</li>
                    <li>Lorem something 2</li>
                    <li>Lorem something 3</li>
                    <li>Lorem something 4</li>
                </ul>
            </div>
        </section>

        <section class="section" id="form">
            <div class="container custom-theme-content">
                <h2 class="h2">Contact Form</h2>
                <?php echo do_shortcode('[contact-form-7 id="66" title="Formularz 1"]') ?>
            </div>
        </section>

        <div class="custom-theme-content">
            <div class="container">
                <h3 class="h3">Post content</h3>
                <?= get_the_content() ?>
            </div>
        </div>

    <?php endwhile;
endif;
?>

<?php
get_footer();