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
        $_p = get_posts(array(
            'post__in'  => array(193, 195, 58, 60, 65, 62, 75),
            'order'   => 'asc',
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
                    the_posts_pagination(array(
                        "screen_reader_text" => ' ',
                        "prev_text" => "New Posts",
                        "next_text" => "Old Posts"
                    ));
                    ?>
                </div>
            </div>
        </div>

    </div>
    <?php get_footer(); ?>