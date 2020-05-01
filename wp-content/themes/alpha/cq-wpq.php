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
        $posts_per_page     = 5;
        $_p                 = new WP_Query(array(
            'posts_per_page'    => $posts_per_page,
            'orderby'           => 'post__in',
            'paged'             => $paged,
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array(
                        'post-format-image',
                        'post-format-video'
                    ),
                    'operator'  =>  'NOT IN',
                ),
            ),
            // 'post_status'   =>  'publish',
            // 'has_password'  => true,
        ));
        // $today = getdate();
        // $_p = new WP_Query('year=' . $today['year'] . '&monthnum=' . $today['mon'] . '&day=' . $today['mday']);

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
                <div class="col-md-12">
                    <?php
                    echo paginate_links(array(
                        'total'     =>  $_p->max_num_pages,
                        'current'   =>  $paged,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>