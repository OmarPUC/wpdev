<?php
define('CS_ACTIVE_FRAMEWORK', false);
define('CS_ACTIVE_METABOX', true);
define('CS_ACTIVE_TAXONOMY', false);
define('CS_ACTIVE_SHORTCODE', true);
define('CS_ACTIVE_CUSTOMIZE', false);

function philosophy_csf_metabox()
{
    CSFramework_Metabox::instance(array());
    CSFramework_Shortcode_Manager::instance(array());
}
add_action('init', 'philosophy_csf_metabox');

function philosophy_page_metabox($options)
{
    $page_id = 0;
    if (isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])) {
        $page_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    $current_pgae_template = get_post_meta($page_id, '_wp_page_template', true);
    if (!in_array($current_pgae_template, array('about.php', 'contact.php'))) {
        return $options;
    }

    $options[] = array(
        'id'    =>  'page-metabox',
        'title' =>  __('Page Meta Info', 'philosophy'),
        'post_type' =>  'page',
        'context'   =>  'normal',
        'priority'  =>  'default',
        'sections'  =>  array(
            array(
                'name'  =>  'page-section1',
                'title' =>  __('Page Settings', 'philosophy'),
                'icon'  =>  'fa fa-image',
                'fields' =>  array(
                    array(
                        'id'    =>  'page-heading',
                        'type'  =>  'text',
                        'title' =>  __('Page Heading', 'philosophy'),
                        'default'   =>  __('Page Heading', 'philosophy')
                    ),
                    array(
                        'id'    =>  'page-teaser',
                        'type'  =>  'textarea',
                        'title'   =>  __('Teaser Text', 'philosophy'),
                        'default'   =>  __('Teaser Text', 'philosophy')
                    ),
                    array(
                        'id'    =>  'is-favorite',
                        'type'  =>  'switcher',
                        'title'   =>  __('Is Favorite?', 'philosophy'),
                        'default'   =>  1
                    ),
                ),
            ),
            array(
                'name'  =>  'page-section2',
                'title' =>  __('Extra Settings', 'philosophy'),
                'icon'  =>  'fa fa-book',
                'fields' =>  array(
                    array(
                        'id'    =>  'page-heading2',
                        'type'  =>  'text',
                        'title' =>  __('Page Heading2', 'philosophy'),
                        'default'   =>  __('Page Heading', 'philosophy')
                    ),
                    array(
                        'id'    =>  'page-teaser2',
                        'type'  =>  'textarea',
                        'title'   =>  __('Teaser Text2', 'philosophy'),
                        'default'   =>  __('Teaser Text', 'philosophy')
                    ),
                    array(
                        'id'    =>  'is-favorite2',
                        'type'  =>  'switcher',
                        'title'   =>  __('Is Favorite?', 'philosophy'),
                        'default'   =>  0
                    ),
                    array(
                        'id'    =>  'is-favorite-extra',
                        'type'  =>  'switcher',
                        'title'   =>  __('Extra Check', 'philosophy'),
                        'default'   =>  0,
                        'dependency'   =>   array('is-favorite2', '==', '1'),
                    ),
                    array(
                        'id'    =>  'page-heading1',
                        'type'  =>  'text',
                        'title' =>  __('Write Your Text', 'philosophy'),
                        'default'   =>  __('write here', 'philosophy'),
                        'dependency'   =>   array('is-favorite-extra', '==', '1'),
                    ),
                    array(
                        'id'         => 'opt-checkbox',
                        'type'       => 'checkbox',
                        'title'      => __('Languages', 'philosophy'),
                        'options'    => array(
                            'option-1' => 'Bnagla',
                            'option-2' => 'English',
                            'option-3' => 'French',
                        ),
                        'attributes' => array(
                            'data-depend-id'    =>  'opt-checkbox'
                        ),
                    ),
                    array(
                        'id'    =>  'page-heading2',
                        'type'  =>  'text',
                        'title' =>  __('Write Your Text', 'philosophy'),
                        'default'   =>  __('write here', 'philosophy'),
                        'dependency'   =>   array('opt-checkbox', 'any', 'option-1,option-3'),
                    ),
                ),
            ),
        ),
    );
    return $options;
}
add_filter('cs_metabox_options', 'philosophy_page_metabox');

function philosophy_upload_metabox($options)
{
    $options[] = array(
        'id'    =>  'page-upload-metabox',
        'title' =>  __('Upload Image', 'philosophy'),
        'post_type' =>  'page',
        'context'   =>  'normal',
        'priority'  =>  'default',
        'sections'  =>  array(
            array(
                'name'  =>  'page-section1',
                'icon'  =>  'fa fa-image',
                'fields' =>  array(
                    // array(
                    //     'id'    =>  'page-upload',
                    //     'type'  =>  'upload',
                    //     'title' =>  __('Upload Image', 'philosophy'),
                    //     'settings'  =>array(
                    //         'upload_type'   =>  'image',
                    //         'button_title'  =>  __('Upload', 'philosophy'),
                    //         'frame_title'  =>  __('Select an image', 'philosophy'),
                    //         'insert_title'  =>  __('Use this image', 'philosophy'),
                    //     ),
                    // ),
                    array(
                        'id'    =>  'page-image',
                        'type'  =>  'image',
                        'title' =>  __('Upload Image', 'philosophy'),
                        'title' =>  __('Add an Image', 'philosophy'),
                    ),
                    array(
                        'id'          => 'opt-gallery',
                        'type'        => 'gallery',
                        'title'       => 'Gallery',
                        'add_title'   => 'Add Images',
                        'edit_title'  => 'Edit Images',
                        'clear_title' => 'Remove Images',
                    ),
                ),
            ),
        ),
    );
    return $options;
}
add_filter('cs_metabox_options', 'philosophy_upload_metabox');

function philosophy_cs_google_map( $options ) {
    $options[] = array(
        'name'       => 'group_1',
        'title'      => 'Group #1',
        'shortcodes' => array(

            array(
                'name'   => 'gmap',
                'title'  => 'Google Map',
                'fields' => array(
                    array(
                        'id'      => 'place',
                        'type'    => 'text',
                        'title'   => 'Place',
                        'help'    => 'Enter Place',
                        'default' => 'Notre Dame College, Dhaka'
                    ),
                    array(
                        'id'      => 'width',
                        'type'    => 'text',
                        'title'   => 'Width',
                        'default' => '100%'
                    ),
                    array(
                        'id'      => 'height',
                        'type'    => 'text',
                        'title'   => 'Height',
                        'default' => 500
                    ),
                    array(
                        'id'      => 'zoom',
                        'type'    => 'text',
                        'title'   => 'Zoom',
                        'default' => 14,
                    )
                ),
            ),

        )
    );

    return $options;
}

add_filter( 'cs_shortcode_options', 'philosophy_cs_google_map' );