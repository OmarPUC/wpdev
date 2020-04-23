<?php
    $alpha_layout_class = "col-md-8";
    $alpha_text_class = "";
    if(!is_active_sidebar('sidebar-1')){
        $alpha_layout_class = "col-md-10 offset-md-1";
        $alpha_text_class = "text-center";
    }
?>

<?php get_header(); ?>
<body <?php body_class(); ?>>

    <?php get_template_part("/template-parts/common/hero"); ?>

    <div class="container">
        <div class="row">
            <div class="<?= $alpha_layout_class; ?>">
                <div class="posts" <?php  ?> >
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                        <div class="post" <?php post_class(); ?>>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title <?= $alpha_text_class; ?> ">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="<?= $alpha_text_class; ?>">
                                            <strong>
                                                <?php the_author(); ?>
                                            </strong><br />
                                            <?= get_the_date(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <?php

                                            //Featherlight does not work in gutenburg, see it later
                                            if (has_post_thumbnail()) {
                                                $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                                // echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                                printf('<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url);
                                                the_post_thumbnail("large", array("class" => "img-fluid"));
                                                echo '</a>';
                                            }
                                            the_content();
                                            wp_link_pages();
                                            ?>
                                        </p>
                                    </div>

                                    <div class="authorsection">
                                        <div class="row">
                                            <div class="col-md-2 authorimage">
                                                <?= get_avatar(get_the_author_meta('id')); ?>
                                            </div>
                                            <div class="col-md-10">
                                                <p>
                                                    <strong>Author: </strong> <?= get_the_author_meta('display_name'); ?>
                                                 </p>
                                                <p>
                                                    <strong>Designation: </strong> <?= get_the_author_meta('description'); ?>
                                                </p>
                                                <p>
                                                    <strong>E-mail: </strong> <?= get_the_author_meta('user_email'); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if (comments_open()) : ?>
                                        <div class="col-md-10 offset-md-1">
                                            <!-- comments_template(); -->
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php
                    endwhile;
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
            </div>
            <?php if(is_active_sidebar('sidebar-1')): ?>
            <div class="col-md-4">
                <?php
                if (is_active_sidebar("sidebar-1")) {
                    dynamic_sidebar("sidebar-1");
                }
                ?>
            </div>
            <?php endif; ?>
    </div>
    </div>


    <?php get_footer(); ?>