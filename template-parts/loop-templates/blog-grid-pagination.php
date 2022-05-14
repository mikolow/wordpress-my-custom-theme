<div class="section blog-grid">
    <div class="top-blog">
        <div class="container">
            <h1 class="h2"><?php echo the_title() ?></h1>
        </div>
    </div>

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
                    the_post(); ?>


                    <article <?php post_class('item'); ?> id="post-<?php the_ID(); ?>">
                        <a href="<?php echo get_permalink() ?>" class="img-wrap" aria-label="featured image link to post">
                            <?php echo get_the_post_thumbnail("", 'medium_large') ?>
                        </a>


                        <div class="category-list">
                            <?php echo get_the_term_list($post->ID, "", "", " | "); ?>
                        </div>


                        <div class="date"><?php echo get_the_date(''); ?></div>

                        <a href="<?php echo esc_url(get_permalink()); ?>" class="title-link" aria-label="title link to post">
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

        <div class="pagination">
            <?php
            echo paginate_links([
                'total'     => $wp_query->max_num_pages,
                'current'   => max(1, get_query_var('paged')),
                'format'    => get_home_url() . '?paged=%#%',
                'base'      => str_replace(999999, '%#%', esc_url(get_pagenum_link(999999))),
                'next_text' => 'następne',
                'prev_text' => "poprzednie",
            ])
            ?>
        </div>


    </div>
</div>