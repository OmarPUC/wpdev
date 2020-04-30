<?php get_header(); ?>

<body <?php body_class(); ?>>

    <?php get_template_part("/template-parts/common/hero"); ?>

    <div class="posts text-center">
        <div class="container">
            <div class="authorsection authorpage">
                <div class="row">
                    <div class="col-md-2 authorimage">
                        <?= get_avatar(get_the_author_meta('ID')); ?>
                    </div>
                    <div class="col-md-10">
                        <h6>
                            <strong>Author: <em><?= get_the_author_meta('display_name'); ?></em></strong>
                        </h6>
                        <p><?= strtoupper(get_the_author_meta('nickname')); ?></p>
                        <p>
                            <strong>Details:</strong> <em><?= get_the_author_meta('description'); ?></em>
                        </p>
                        <p>
                            <strong>E-mail:</strong> <em><?= get_the_author_meta('user_email'); ?></em>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
        <?php
        }
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