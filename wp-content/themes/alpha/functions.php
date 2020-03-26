<?php

function alpha_bootstrapping(){
    load_theme_textdomain("alpha");
    add_theme_support("post_thumbnails");
    add_theme_support("title_tag");
}
add_action("after_setup_theme","alpha_bootstrapping");


function alpha_assets(){
    wp_enqueue_style("alpha",get_stylesheet_uri());
    wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts","alpha_assets");


function alpha_sidebar(){
    register_sidebar(
        array(
            'name'          => __( 'Single Post Sidebar', 'alpha' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Right sidebar.','alpha' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Left', 'alpha' ),
            'id'            => 'footer-left',
            'description'   => __( 'Widgetized Area On The Left Side.','alpha' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Right', 'alpha' ),
            'id'            => 'footer-right',
            'description'   => __( 'Widgetized Area On The Right Side.','alpha' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
}
add_action("widgets_init","alpha_sidebar");


function alpha_the_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
        echo get_the_password_form();
    }
}
add_filter("the_excerpt","alpha_the_excerpt");



function alpha_protected_title_change(){
    return "%s";
}
add_filter("protected_title_format","alpha_protected_title_change");