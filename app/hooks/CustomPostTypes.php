<?php

namespace CustomDev\App\Hooks;

class CustomPostTypes
{
    public function __construct()
    {
        //Social posts
        add_action('init', [$this, 'example']);
    }



    public function example()
    {
        // register_post_type(
        //     'Example',
        //     array(
        //         'labels' => array(
        //             'name'          => __('Examples'),
        //             'singular_name' => __('Example'),
        //             'add_new_item'  => __('Add new example'),
        //             'edit_item'     => __('Update example'),
        //             'new_item'      => __('New example'),
        //             'view_item'     => __('View example'),
        //             'view_items'    => __('View examples'),
        //             'search_items'  => __('Search in examples')
        //         ),
        //         'public'        => true,
        //         'has_archive'   => false,
        //         'show_in_rest'  => true,
        //         'show_in_menu'  => false,
        //         'supports'      => array(
        //             'custom-fields'
        //         ),
        //         'rewrite' => array(
        //             'with_front' => false
        //         )
        //     )
        // );
    }
}

new CustomPostTypes();