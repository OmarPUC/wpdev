<?php
define('CS_ACTIVE_FRAMEWORK', false);
define('CS_ACTIVE_METABOX', true);
define('CS_ACTIVE_TAXONOMY', false);
define('CS_ACTIVE_SHORTCODE', false);
define('CS_ACTIVE_CUSTOMIZE', false);

function philosophy_csf_metabox()
{
    CSFramework_Metabox::instance(array());
}

function philosophy_page_metabox($options)
{
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
                        'title'      => 'Languages',
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
