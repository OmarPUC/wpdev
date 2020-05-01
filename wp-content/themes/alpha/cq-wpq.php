<?php

/**
 * Template Name: Custom Query WPQuery
 */
?>

<?php get_header(); ?>

<body <?php body_class(); ?>>

    <?php get_template_part("/template-parts/common/hero"); ?>

    <div class="posts text-center">
        <?php
        $paged              = get_query_var("paged") ? get_query_var("paged") : 1;
        $posts_per_page     = 3;
        $posts_id           = array(193, 75, 195, 74, 69, 50, 56, 58, 60, 65, 62);
        $_p                 = new WP_Query(array(
            'posts_per_page'    => $posts_per_page,
            'post__in'          => $posts_id,
            'orderby'           => 'post__in',
            'paged'             => $paged,
        ));
        while ($_p->have_posts()) {
            $_p->the_post();
        ?>
            <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
        <?php
        }
        wp_reset_query();
        ?>
        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>