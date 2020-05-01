<?php

/**
 * Template Name: Custom Query
 */
?>

<?php get_header(); ?>

<body <?php body_class(); ?>>

    <?php get_template_part("/template-parts/common/hero"); ?>

    <div class="posts text-center">
        <?php
        $paged = get_query_var("paged") ? get_query_var("paged") : 1;
        $posts_per_page = 2;
        $total = 9;
        $posts_id = array(193, 75, 195, 74, 69, 50, 56, 58, 60, 65, 62);
        $_p = get_posts(array(
            'posts_per_page'    => $posts_per_page,
            'author__in'        => array(2),
            // 'post__in'          => $posts_id,
            'orderby'           => 'post__in',
            'paged'             => $paged,
        ));
        foreach ($_p as $post) {
            setup_postdata($post);
        ?>
            <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
        <?php
        }
        wp_reset_postdata();
        ?>
        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-8">
                    <?php
                    echo paginate_links(array(
                        // 'total' =>  ceil(count($posts_id) / $posts_per_page),
                        'total' =>  ceil($total / $posts_per_page),
                    ));
                    ?>
                </div>
            </div>
        </div>

    </div>
    <?php get_footer(); ?>