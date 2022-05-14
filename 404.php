<?php
get_header();
?>

    <div class="container custom-theme-content">

        <section class="row section error-404 not-found">
            <div class="col">

                <?php
                $value = get_field('acf__404--title', 'options');
                if ($value): ?>
                    <h1 class="page-title h1"><?php echo esc_html($value); ?></h1>
                <?php endif; ?>
                <a href="<?php echo home_url() ?>">
                    <?php
                    $value = get_field('acf__404--backToHome', 'options');
                    if ($value): ?>
                        <span><?php echo esc_html($value); ?></>
                    <?php endif; ?>
                </a>
            </div>

        </section>

    </div>

<?php
get_footer();
