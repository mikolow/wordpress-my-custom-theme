<div class="blog-grid">
    <div class="container">

        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>


        <div class="items js-items">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>

                    <article <?php post_class('item'); ?> id="post-<?php the_ID($post); ?>">
                        <a href="<?php echo get_permalink($post) ?>" class="img-wrap" aria-label="featured images link to post">
                            <?php echo get_the_post_thumbnail($post, 'medium_large'); ?>
                        </a>

                        <div class="date"><?php echo get_the_date('', $post); ?></div>

                        <a href="<?php echo esc_url(get_permalink($post)); ?>" class="title-link" aria-label="title link to post">
                            <h2 class="h3 post-title"><?php echo esc_html($post->post_title); ?></h2></a>

                        <div class="excerpt"><?php echo esc_html(get_the_excerpt($post)); ?></div>
                        <a href="<?php echo esc_url(get_permalink($post)); ?>" class="title-link" aria-label="excerpt link to post">
                            <span class="read-more">Czytaj więcej</span></a>

                    </article>

                <?php
                endwhile;
            endif;
            ?>
        </div>

        <div class="fetchButtonWrapper container">
            <div class="custom-loader"></div>


            <button class="fetchMoreProducts btn2"
                    data-max="<?php echo count($wp_query->posts); ?>"
                    data-perpage="3"
                    data-term-id="-1"
                    data-taxonomy=""
                    data-offset="1"
                    data-post-type=""
                    data-home="<?php echo esc_html(site_url()); ?>">

                Więcej
            </button>

        </div>
    </div>
</div>