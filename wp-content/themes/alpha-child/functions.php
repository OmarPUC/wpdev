<?php

function alpha_child_assets()
{
    wp_enqueue_style('parent-style', get_parent_theme_file_uri('/style.css'));
}
add_action('wp_enqueue_scripts', 'alpha_child_assets');

function alpha_child_assets_dequeue()
{
    wp_dequeue_style('alpha-style');
    wp_deregister_style('alpha-style');
    wp_enqueue_style('alpha-style', get_theme_file_uri('/assets/css/alpha.css'));
}
add_action('wp_enqueue_scripts', 'alpha_child_assets_dequeue', 11);

// function alpha_child_bootstrap_ed()
// {
//     wp_dequeue_style('bootstrap');
//     wp_deregister_style('bootstrap');
//     wp_enqueue_style('bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.bundle.js');
// }
// add_action('wp_enqueue_scripts', 'alpha_child_bootstrap_ed');


if (!function_exists("alpha_about_page_template_banner")) {
    function alpha_about_page_template_banner()
    {
        if (is_page()) {
            $alpha_feat_image = get_the_post_thumbnail_url(null, "large");
?>
            <style>
                .page-header {
                    background-image: url(<?php echo $alpha_feat_image; ?>);
                }
            </style>
            <?php
        }

        if (is_front_page()) {
            if (current_theme_supports("custom-header")) {
            ?>
                <style>
                    .header {
                        background-image: url(<?php header_image(); ?>);
                        background-size: cover;
                        margin-bottom: 50px;
                    }

                    .header h1.heading a,
                    h3.tagline {
                        color: #<?php echo get_header_textcolor(); ?>;

                        <?php
                        if (!display_header_text()) {
                            echo "display: none;";
                        }
                        ?>
                    }

                    .header h1.heading a {
                        font-size: 86px;
                    }
                </style>
<?php
            }
        }
    }

    add_action("wp_head", "alpha_about_page_template_banner", 11);
}

function alpha_todays_date()
{
    echo date("d-m-Y");
}
