<?php
/**
 * Magazine Express Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Magazine Express
 */

if ( ! defined( 'MAGAZINE_EXPRESS_URL' ) ) {
define('MAGAZINE_EXPRESS_URL',__('https://www.themagnifico.net/themes/magazine-wordpress-theme/','magazine-express'));
}
if ( ! defined( 'MAGAZINE_EXPRESS_TEXT' ) ) {
    define( 'MAGAZINE_EXPRESS_TEXT', __( 'Magazine Express Pro','magazine-express' ));
}
if ( ! defined( 'MAGAZINE_EXPRESS_BUY_TEXT' ) ) {
    define( 'MAGAZINE_EXPRESS_BUY_TEXT', __( 'Buy Magazine Express Pro','magazine-express' ));
}

use WPTRT\Customize\Section\Magazine_Express_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Magazine_Express_Button::class );

    $manager->add_section(
        new Magazine_Express_Button( $manager, 'magazine_express', [
           'title'       => esc_html( MAGAZINE_EXPRESS_TEXT,'magazine-express' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'magazine-express' ),
            'button_url'  => esc_url( MAGAZINE_EXPRESS_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'magazine-express-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'magazine-express-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magazine_express_customize_register($wp_customize){

    // Pro Version
    class Magazine_Express_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( MAGAZINE_EXPRESS_BUY_TEXT,'magazine-express' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Magazine_Express_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('magazine_express_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'magazine_express_sanitize_number_absint'
    ));
    $wp_customize->add_control('magazine_express_logo_max_height',array(
        'label' => esc_html__('Logo Width','magazine-express'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));
    
    if (isset($wp_customize->selective_refresh)) {
        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title',
            'render_callback' => 'magazine_express_customize_partial_blogname',
        ));
    }

    $wp_customize->add_setting('magazine_express_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'magazine-express' ),
        'section'        => 'title_tagline',
        'settings'       => 'magazine_express_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('magazine_express_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'magazine-express' ),
        'section'        => 'title_tagline',
        'settings'       => 'magazine_express_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('magazine_express_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magazine_express_logo_title_color', array(
        'label'    => __('Site Title Color', 'magazine-express'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('magazine_express_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magazine_express_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'magazine-express'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    // Theme Color
    $wp_customize->add_section('magazine_express_color_option',array(
        'title' => esc_html__('Theme Color','magazine-express'),
    ));

    $wp_customize->add_setting( 'magazine_express_theme_color_one', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magazine_express_theme_color_one', array(
        'label' => esc_html__('First Color Option','magazine-express'),
        'section' => 'magazine_express_color_option',
        'settings' => 'magazine_express_theme_color_one'
    )));

    $wp_customize->add_setting( 'magazine_express_theme_color_two', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magazine_express_theme_color_two', array(
        'label' => esc_html__('Second Color Option','magazine-express'),
        'section' => 'magazine_express_color_option',
        'settings' => 'magazine_express_theme_color_two'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_color', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_theme_color', array(
        'section'     => 'magazine_express_color_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    // Header
    $wp_customize->add_section('magazine_express_header_top',array(
        'title' => esc_html__('Header','magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_trending_article_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('magazine_express_trending_article_text',array(
        'label' => esc_html__('Trending Article Text','magazine-express'),
        'section' => 'magazine_express_header_top',
        'setting' => 'magazine_express_trending_article_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting( 'magazine_express_advertise_page', array(
        'default'           => '',
        'sanitize_callback' => 'magazine_express_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'magazine_express_advertise_page', array(
        'label'    => __( 'Select Advertise Page', 'magazine-express' ),
        'description'    => __( 'Image Dimension ( 650px x 100px )', 'magazine-express' ),
        'section'  => 'magazine_express_header_top',
        'type'     => 'dropdown-pages'
    ) );

    $wp_customize->add_setting('magazine_express_subscribe_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('magazine_express_subscribe_text',array(
        'label' => esc_html__('Button Text','magazine-express'),
        'section' => 'magazine_express_header_top',
        'setting' => 'magazine_express_subscribe_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('magazine_express_subscribe_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('magazine_express_subscribe_url',array(
        'label' => esc_html__('Button Link','magazine-express'),
        'section' => 'magazine_express_header_top',
        'setting' => 'magazine_express_subscribe_url',
        'type'  => 'url'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'magazine_express_header_top',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('magazine_express_general_settings',array(
        'title' => esc_html__('General Settings','magazine-express'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('magazine_express_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'magazine-express' ),
        'section'        => 'magazine_express_general_settings',
        'settings'       => 'magazine_express_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'magazine_express_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magazine_express_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','magazine-express'),
        'section' => 'magazine_express_general_settings',
        'settings' => 'magazine_express_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'magazine_express_preloader_dot_1_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magazine_express_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','magazine-express'),
        'section' => 'magazine_express_general_settings',
        'settings' => 'magazine_express_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'magazine_express_preloader_dot_2_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magazine_express_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','magazine-express'),
        'section' => 'magazine_express_general_settings',
        'settings' => 'magazine_express_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('magazine_express_scroll_hide', array(
        'default' => '',
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'magazine-express' ),
        'section'        => 'magazine_express_general_settings',
        'settings'       => 'magazine_express_scroll_hide',
        'type'           => 'checkbox',
    )));

     $wp_customize->add_setting('magazine_express_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'magazine_express_sanitize_choices'
    ));
    $wp_customize->add_control('magazine_express_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'magazine_express_general_settings',
        'choices' => array(
            'Right' => __('Right','magazine-express'),
            'Left' => __('Left','magazine-express'),
            'Center' => __('Center','magazine-express')
        ),
    ) );

    $wp_customize->add_setting('magazine_express_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'magazine-express' ),
        'section'        => 'magazine_express_general_settings',
        'settings'       => 'magazine_express_sticky_header',
        'type'           => 'checkbox',
    )));

    // Product Columns
    $wp_customize->add_setting( 'magazine_express_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'magazine_express_sanitize_select',
    ) );

   $wp_customize->add_control('magazine_express_products_per_row', array(
       'label' => __( 'Product per row', 'magazine-express' ),
       'section'  => 'magazine_express_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('magazine_express_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'magazine-express' ),
        'section'        => 'magazine_express_general_settings',
        'settings'       => 'magazine_express_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('magazine_express_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'magazine_express_sanitize_choices'
    ));
    $wp_customize->add_control('magazine_express_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','magazine-express'),
        'section' => 'magazine_express_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','magazine-express'),
            'Right Sidebar' => __('Right Sidebar','magazine-express'),
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('magazine_express_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'magazine-express' ),
        'section'        => 'magazine_express_general_settings',
        'settings'       => 'magazine_express_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('magazine_express_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'magazine_express_sanitize_choices'
    ));
    $wp_customize->add_control('magazine_express_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','magazine-express'),
        'section' => 'magazine_express_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','magazine-express'),
            'Right Sidebar' => __('Right Sidebar','magazine-express'),
        ),
    ) );

    $wp_customize->add_setting('magazine_express_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'magazine_express_sanitize_choices'
    ));
    $wp_customize->add_control('magazine_express_woocommerce_product_sale',array(
        'type' => 'radio',
        'section' => 'magazine_express_general_settings',
        'choices' => array(
            'Right' => __('Right','magazine-express'),
            'Left' => __('Left','magazine-express'),
            'Center' => __('Center','magazine-express')
        ),
    ) );

    // Related Product
    $wp_customize->add_setting('magazine_express_woocommerce_related_product_show_hide', array(
        'default' => true,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_woocommerce_related_product_show_hide',array(
        'label'          => __( 'Show / Hide Related product', 'magazine-express' ),
        'section'        => 'magazine_express_general_settings',
        'settings'       => 'magazine_express_woocommerce_related_product_show_hide',
        'type'           => 'checkbox',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'magazine_express_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

     // Post Settings
     $wp_customize->add_section('magazine_express_post_settings',array(
        'title' => esc_html__('Post Settings','magazine-express'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('magazine_express_post_page_title',array(
        'sanitize_callback' => 'magazine_express_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'magazine-express'),
        'section'     => 'magazine_express_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_post_page_meta',array(
        'sanitize_callback' => 'magazine_express_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'magazine-express'),
        'section'     => 'magazine_express_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_post_page_thumb',array(
        'sanitize_callback' => 'magazine_express_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'magazine-express'),
        'section'     => 'magazine_express_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on post post.', 'magazine-express'),
    ));

    $wp_customize->add_setting( 'magazine_express_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'magazine_express_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'magazine_express_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Post Page Image Border Radius','magazine-express' ),
        'section'     => 'magazine_express_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('magazine_express_post_page_cat',array(
        'sanitize_callback' => 'magazine_express_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_post_page_cat',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Category and Tags', 'magazine-express'),
        'section'     => 'magazine_express_post_settings',
        'description' => esc_html__('Check this box to enable category and tags on post page.', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_single_post_thumb',array(
        'sanitize_callback' => 'magazine_express_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'magazine-express'),
        'section'     => 'magazine_express_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_single_post_meta',array(
        'sanitize_callback' => 'magazine_express_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'magazine-express'),
        'section'     => 'magazine_express_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_single_post_title',array(
            'sanitize_callback' => 'magazine_express_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'magazine-express'),
        'section'     => 'magazine_express_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control('magazine_express_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','magazine-express'),
        'section' => 'magazine_express_post_settings',
    ));

    $wp_customize->add_setting('magazine_express_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('magazine_express_single_post_comment_title',array(
        'label' => __('Add Comment Title','magazine-express'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'magazine-express' ),
        ),
        'section'=> 'magazine_express_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('magazine_express_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('magazine_express_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','magazine-express'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'magazine-express' ),
        ),
        'section'=> 'magazine_express_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'magazine_express_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('magazine_express_page_settings',array(
        'title' => esc_html__('Page Settings','magazine-express'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('magazine_express_single_page_title',array(
            'sanitize_callback' => 'magazine_express_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'magazine-express'),
        'section'     => 'magazine_express_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_single_page_thumb',array(
        'sanitize_callback' => 'magazine_express_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('magazine_express_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'magazine-express'),
        'section'     => 'magazine_express_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'magazine-express'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'magazine_express_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    // Social Link
    $wp_customize->add_section('magazine_express_social_link',array(
        'title' => esc_html__('Social Links','magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_social_icon_setting', array(
        'default' => 0,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_social_icon_setting',array(
        'label'          => __( 'Enable Social icon', 'magazine-express' ),
        'section'        => 'magazine_express_social_link',
        'settings'       => 'magazine_express_social_icon_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('magazine_express_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('magazine_express_facebook_url',array(
        'label' => esc_html__('Facebook Link','magazine-express'),
        'section' => 'magazine_express_social_link',
        'setting' => 'magazine_express_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('magazine_express_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('magazine_express_twitter_url',array(
        'label' => esc_html__('Twitter Link','magazine-express'),
        'section' => 'magazine_express_social_link',
        'setting' => 'magazine_express_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('magazine_express_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('magazine_express_intagram_url',array(
        'label' => esc_html__('Intagram Link','magazine-express'),
        'section' => 'magazine_express_social_link',
        'setting' => 'magazine_express_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('magazine_express_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('magazine_express_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','magazine-express'),
        'section' => 'magazine_express_social_link',
        'setting' => 'magazine_express_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('magazine_express_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('magazine_express_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','magazine-express'),
        'section' => 'magazine_express_social_link',
        'setting' => 'magazine_express_pintrest_url',
        'type'  => 'url'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_social_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_social_setting', array(
        'section'     => 'magazine_express_social_link',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('magazine_express_top_slider',array(
        'title' => esc_html__('Post Category Slider','magazine-express'),
        'description' => esc_html__('Here you have to add 3 different post categories in below dropdown. Image Dimension ( 500px x 500px )','magazine-express')
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('magazine_express_top_post_category_1',array(
        'default'   => 'select',
        'sanitize_callback' => 'magazine_express_sanitize_choices',
    ));
    $wp_customize->add_control('magazine_express_top_post_category_1',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display slider post','magazine-express'),
        'section' => 'magazine_express_top_slider',
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('magazine_express_top_post_category_2',array(
        'default'   => 'select',
        'sanitize_callback' => 'magazine_express_sanitize_choices',
    ));
    $wp_customize->add_control('magazine_express_top_post_category_2',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display slider post','magazine-express'),
        'section' => 'magazine_express_top_slider',
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('magazine_express_top_post_category_3',array(
        'default'   => 'select',
        'sanitize_callback' => 'magazine_express_sanitize_choices',
    ));
    $wp_customize->add_control('magazine_express_top_post_category_3',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display slider post','magazine-express'),
        'section' => 'magazine_express_top_slider',
    ));

    $wp_customize->add_setting('magazine_express_slider_loop', array(
        'default' => 1,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'magazine_express_slider_loop',array(
        'label'          => __( 'Enable Slider Loop', 'magazine-express' ),
        'section'        => 'magazine_express_top_slider',
        'settings'       => 'magazine_express_slider_loop',
        'type'           => 'checkbox',
    )));

    //Opacity
    $wp_customize->add_setting('magazine_express_slider_opacity_color',array(
      'default'              => '',
      'sanitize_callback' => 'magazine_express_sanitize_choices'
    ));

    $wp_customize->add_control( 'magazine_express_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','magazine-express' ),
    'section'     => 'magazine_express_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','magazine-express'),
      '0.1' =>  esc_attr('0.1','magazine-express'),
      '0.2' =>  esc_attr('0.2','magazine-express'),
      '0.3' =>  esc_attr('0.3','magazine-express'),
      '0.4' =>  esc_attr('0.4','magazine-express'),
      '0.5' =>  esc_attr('0.5','magazine-express'),
      '0.6' =>  esc_attr('0.6','magazine-express'),
      '0.7' =>  esc_attr('0.7','magazine-express'),
      '0.8' =>  esc_attr('0.8','magazine-express'),
      '0.9' =>  esc_attr('0.9','magazine-express')
    ),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'magazine_express_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    //Featured Category
    $wp_customize->add_section('magazine_express_featured_category',array(
        'title' => esc_html__('Featured Category','magazine-express'),
        'description' => esc_html__('Here you have to select post category which will display perticular featured post in the home page. Image Dimension ( 500px x 500px )','magazine-express')
    ));

    $wp_customize->add_setting('magazine_express_featured_category_title', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('magazine_express_featured_category_title', array(
        'label' => __('Section Title', 'magazine-express'),
        'section' => 'magazine_express_featured_category',
        'priority' => 1,
        'type' => 'text',
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('magazine_express_featured_category_1',array(
        'default'   => 'select',
        'sanitize_callback' => 'magazine_express_sanitize_choices',
    ));
    $wp_customize->add_control('magazine_express_featured_category_1',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display box post','magazine-express'),
        'section' => 'magazine_express_featured_category',
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('magazine_express_featured_category_2',array(
        'default'   => 'select',
        'sanitize_callback' => 'magazine_express_sanitize_choices',
    ));
    $wp_customize->add_control('magazine_express_featured_category_2',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display sidebar post','magazine-express'),
        'section' => 'magazine_express_featured_category',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_category_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_category_setting', array(
        'section'     => 'magazine_express_featured_category',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('magazine_express_site_footer_section', array(
        'title' => esc_html__('Footer', 'magazine-express'),
    ));

    $wp_customize->add_setting('magazine_express_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'magazine_express_footer_bg_image',array(
        'label' => __('Footer Background Image','magazine-express'),
        'section' => 'magazine_express_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('magazine_express_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('magazine_express_footer_text_setting', array(
        'label' => __('Replace the footer text', 'magazine-express'),
        'section' => 'magazine_express_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('magazine_express_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'magazine_express_sanitize_checkbox'
    ));
    $wp_customize->add_control('magazine_express_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','magazine-express'),
        'section' => 'magazine_express_site_footer_section',
    ));

    $wp_customize->add_setting('magazine_express_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magazine_express_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'magazine-express'),
        'section'  => 'magazine_express_site_footer_section',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Magazine_Express_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Magazine_Express_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'magazine_express_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'magazine-express' ),
        'description' => esc_url( MAGAZINE_EXPRESS_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'magazine_express_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magazine_express_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magazine_express_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magazine_express_customize_preview_js(){
    wp_enqueue_script('magazine-express-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'magazine_express_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function magazine_express_panels_js() {
    wp_enqueue_style( 'magazine-express-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'magazine-express-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'magazine_express_panels_js' );
