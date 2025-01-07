<?php

class Type_Contact
{


    public static function init()
    {

        add_action('acf/init', [__CLASS__, 'acf_add_local_field_group']);
        add_action('init', [__CLASS__, 'register_type']);

        add_action('wp_ajax_contact', [__CLASS__, 'handle_form_contacts']);
        add_action('wp_ajax_nopriv_contact', [__CLASS__, 'handle_form_contacts']);
    }

    public static function register_type()
    {
        register_post_type(
            'contacts',
            array(
                'labels' => array(
                    'name' => __('Contacts'),
                    'singular_name' => __('Contacts')
                ),
                'public' => true,
                'show_ui' => true,
                'has_archive' => true,
                'menu_position'      => 6,
                'show_in_nav_menus' => true,
                'show_in_menu' => true,
                'supports' => array('title', 'custom-fields'),
                'menu_icon' => 'dashicons-email',
            )
        );
    }

    public static function handle_form_contacts()
    {

        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';

        if (empty($name) || empty($phone)) {
            wp_send_json_error(array('message' => 'Please fill in all fields.'));
            exit;
        }

        $post_data = array(
            'post_title'   => $name,
            'post_status'  => 'publish',
            'post_type'    => 'contacts',
        );

        $post_id = wp_insert_post($post_data);

        if ($post_id) {
            update_post_meta($post_id, 'name_form', $name);
            update_post_meta($post_id, 'phone_form', $phone);


            $admin_email = get_option('admin_email');
            $subject = 'New Contact Form Submission';
            $message = "A new contact form submission has been received.\n\nName: $name\nPhone: $phone";

            wp_mail($admin_email, $subject, $message);
        }
    }

    public static function acf_add_local_field_group()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group(array(
                'key' => 'group_675ac01e3ba76',
                'title' => 'Contacts Form',
                'fields' => array(
                    array(
                        'key' => 'field_675ac01e52f5c',
                        'label' => 'Name',
                        'name' => 'name_form',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array(
                        'key' => 'field_675ac04552f5d',
                        'label' => 'Phone',
                        'name' => 'phone_form',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'contacts',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));

        endif;
    }
}
