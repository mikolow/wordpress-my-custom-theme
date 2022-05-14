<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'custom'); ?></a>

    <header id="masthead" class="site-header">

        <div class="row-flex inner-header container">
            <div class="site-branding">

           <?php the_custom_logo();?>

            </div>


            <div class="main-nav-wrap">
                <div class="shutter"></div>
                <nav id="site-navigation" class="main-navigation">
                    <div class="close-wrap">
                        <button id="hamburger-close" class="menu-toggle hamburger hamburger--emphatic" type="button" aria-controls="primary-menu" aria-expanded="false" aria-label="close-menu">
                            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                        </button>
                    </div>


                    <?php
                    wp_nav_menu([
                            'theme_location'  => 'primary-menu',
                            'container_class' => 'nav-container',
                        ]
                    );
                    ?>

                </nav>
            </div>

            <button id="hamburger" class="menu-toggle hamburger hamburger--emphatic" type="button" aria-controls="primary-menu" aria-expanded="false" aria-label="open-menu">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>

        </div>


    </header>
    <main id="primary" class="site-main">