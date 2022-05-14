</main>
<footer class="footer">
    <div class="container">
        <h2>ACF footer check</h2>
        <row class="row row--grid">
            <div class="col col--one">
                <p>kolumna 1</p>
            </div>
            <div class="col col--two">
                <p>kolumna 2</p>
            </div>
        </row>
    </div>

    <button id="ScrollToTopBtn" style="display: block;" aria-label="back to top">
        <span class="img-wrap"></span>
    </button>

    <div class="cookies">
        <div class="cookies__content container">
            <p class=cookies__paragraph><?php echo get_field('acf__cookies--text', 'options'); ?>

                <?php
                $link            = get_field('acf__cookies--link', 'options');
                if ($link):
                    $link_url = $link['url'];
                    $link_title  = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="cookies__link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>

            </p>
            <button class="cookies__close btn-cookies"><?php echo get_field('acf__cookies--button', 'options'); ?></button>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>