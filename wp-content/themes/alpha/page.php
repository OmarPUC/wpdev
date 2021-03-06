<?php get_header(); ?>

<body <?php body_class(); ?>>

    <?php get_template_part("/template-parts/common/hero"); ?>
    <div class="posts">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <div class="post" <?php post_class(); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title text-center">
                                <?php the_title(); ?>
                            </h2>
                            <!-- <p class="text-center">
                                <strong> 
                                the_author();
                               </strong><br/>
                                 echo get_the_date(); ?>
                            </p> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider">
                                <?php
                                if (class_exists('Attachments')) {
                                    $attachments = new Attachments('slider');
                                    if ($attachments->exist()) {
                                        while ($attachment = $attachments->get()) { ?>
                                            <div>
                                                <?php echo $attachments->image('large'); ?>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <p>
                                <?php
                                if (has_post_thumbnail()) {
                                    $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                    echo '<a class="popup" href="#" data-featherlight="image">';
                                    the_post_thumbnail("large", array("class" => "img-fluid"));
                                    echo '</a>';
                                }
                                the_content();
                                ?>
                            </p>
                        </div>
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

    <?php get_footer(); ?>