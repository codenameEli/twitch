<?php


if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_5764165604eda',
        'title' => 'Completion Date',
        'fields' => array (
            array (
                'key' => 'field_57641677155fa',
                'label' => 'Date',
                'name' => 'completion_date_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'F j, Y',
                'return_format' => 'F j, Y',
                'first_day' => 1,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5761af0a84326',
        'title' => 'CTA Slideshow',
        'fields' => array (
            array (
                'key' => 'field_5761b10230046',
                'label' => 'Content',
                'name' => 'cta_slideshow_content',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => '',
                'max' => '',
                'layout' => 'row',
                'button_label' => 'Add Row',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5761b13630047',
                        'label' => 'Text',
                        'name' => 'cta_slideshow_content_text',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => 'br',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_5761b15930048',
                        'label' => 'Button Text',
                        'name' => 'cta_slideshow_content_button_text',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_5761b17a30049',
                        'label' => 'Button Link',
                        'name' => 'cta_slideshow_content_button_link',
                        'type' => 'page_link',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array (
                        ),
                        'taxonomy' => array (
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_5761b1b83004a',
                        'label' => 'Gallery',
                        'name' => 'cta_slideshow_content_gallery',
                        'type' => 'gallery',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'min' => '',
                        'max' => '',
                        'preview_size' => 'thumbnail',
                        'insert' => 'append',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '1064',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5759b51ccc37c',
        'title' => 'External Link',
        'fields' => array (
            array (
                'key' => 'field_5759b5b999bdc',
                'label' => 'Text',
                'name' => 'url_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_5759b52aa78f8',
                'label' => 'URL',
                'name' => 'url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'https://towermarketing.net',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'affiliation',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_576196ce8580e',
        'title' => 'Hero Slideshow',
        'fields' => array (
            array (
                'key' => 'field_576196dc26025',
                'label' => 'Images',
                'name' => 'hero_slideshow_images',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'min' => '',
                'max' => '',
                'preview_size' => 'full',
                'insert' => 'append',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5759b3b63215c',
        'title' => 'Job Description',
        'fields' => array (
            array (
                'key' => 'field_5759b3f1474e1',
                'label' => 'Position',
                'name' => 'job_description_position',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'executive',
                ),
            ),
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5759b90fbd455',
        'title' => 'Location Information',
        'fields' => array (
            array (
                'key' => 'field_5759b91a64961',
                'label' => 'Address',
                'name' => 'location_information_address',
                'type' => 'google_map',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'center_lat' => '40.08840130000001',
                'center_lng' => '-76.3504524',
                'zoom' => '',
                'height' => '',
            ),
            array (
                'key' => 'field_5759b92b64962',
                'label' => 'Phone Number',
                'name' => 'location_information_phone_number',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_5759b93564963',
                'label' => 'Fax Number',
                'name' => 'location_information_fax_number',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'location',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5759b829cb49e',
        'title' => 'Photographer Information',
        'fields' => array (
            array (
                'key' => 'field_5759b83f4765d',
                'label' => 'Address',
                'name' => 'photographer_information_address',
                'type' => 'google_map',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'center_lat' => '',
                'center_lng' => '',
                'zoom' => '',
                'height' => '',
            ),
            array (
                'key' => 'field_5759b8574765e',
                'label' => 'Phone Number',
                'name' => 'photographer_information_phone_number',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_5759b8644765f',
                'label' => 'Email',
                'name' => 'photographer_information_email',
                'type' => 'email',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array (
                'key' => 'field_57682b8357a09',
                'label' => 'Link',
                'name' => 'photographer_information_link',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'photographer',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5759aac677e26',
        'title' => 'Photography Credits',
        'fields' => array (
            array (
                'key' => 'field_5759aad56101a',
                'label' => 'Photographer',
                'name' => 'photography_credits_photographer',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array (
                    0 => 'photographer',
                ),
                'taxonomy' => array (
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5759b3397353a',
        'title' => 'Project Gallery',
        'fields' => array (
            array (
                'key' => 'field_5759b34f7e350',
                'label' => 'Additional Pictures',
                'name' => 'project_gallery_additional_pictures',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'min' => '',
                'max' => '',
                'preview_size' => 'tower-archive-featured-image',
                'insert' => 'append',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5767f85271f7f',
        'title' => 'Related Projects',
        'fields' => array (
            array (
                'key' => 'field_5767f85eaa6b7',
                'label' => 'Projects',
                'name' => 'related_projects_projects',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array (
                    0 => 'project',
                ),
                'taxonomy' => array (
                ),
                'allow_null' => 0,
                'multiple' => 1,
                'return_format' => 'id',
                'ui' => 1,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5762bc3683e03',
        'title' => 'Repeatable Blocks',
        'fields' => array (
            array (
                'key' => 'field_5762bc8de5959',
                'label' => 'Content',
                'name' => 'repeatable_blocks_content',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_5762bcd1e595a',
                'min' => '',
                'max' => '',
                'layout' => 'block',
                'button_label' => 'Add Row',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5762bd45e595d',
                        'label' => 'Is a Social Rotator Block?',
                        'name' => 'repeatable_blocks_content_is_a_social_rotator_block',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array (
                        'key' => 'field_5762bcd1e595a',
                        'label' => 'Text',
                        'name' => 'repeatable_blocks_content_text',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5762bd45e595d',
                                    'operator' => '!=',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => 'br',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_5762bcf3e595b',
                        'label' => 'Button Text',
                        'name' => 'repeatable_blocks_content_button_text',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5762bd45e595d',
                                    'operator' => '!=',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_5762bd26e595c',
                        'label' => 'Button Link',
                        'name' => 'repeatable_blocks_content_button_link',
                        'type' => 'page_link',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5762bd45e595d',
                                    'operator' => '!=',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array (
                        ),
                        'taxonomy' => array (
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_5767f7a9f1857',
        'title' => 'Testimonials Slideshow',
        'fields' => array (
            array (
                'key' => 'field_5767f7b7fe799',
                'label' => 'Testimonials',
                'name' => 'testimonials_slideshow_testimonials',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array (
                    0 => 'testimonial',
                ),
                'taxonomy' => array (
                ),
                'allow_null' => 0,
                'multiple' => 1,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;


if( function_exists('acf_add_options_page') )
{
    // acf_add_options_page(array(
    //     'page_title'    => 'Theme Options',
    //     'menu_title'    => 'Options',
    //     'menu_slug'     => 'theme-options',
    //     'capability'    => 'edit_posts',
    //     'redirect'      => false
    // ));

    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Header Settings',
    //     'menu_title'    => 'Header',
    //     'parent_slug'   => 'theme-options',
    // ));

    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Footer Settings',
    //     'menu_title'    => 'Footer',
    //     'parent_slug'   => 'theme-options',
    // ));
}