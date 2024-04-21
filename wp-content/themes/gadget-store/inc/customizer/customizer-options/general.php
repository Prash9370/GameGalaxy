<?php
function gadget_store_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'gadget_store_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'gadget-store' ),
		)
	);

	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb Section', 'gadget-store' ),
			'priority' => 1,
			'panel' => 'gadget_store_general',
		)
	);
	
	// Settings 
	$wp_customize->add_setting(
		'gadget_store_breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gadget_store_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'gadget_store_breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','gadget-store'),
			'section' => 'gadget_store_breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'gadget-store' ),
			'section'     => 'gadget_store_breadcrumb_setting',
			'settings'    => 'gadget_store_hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Preloader Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_preloader_section_setting', array(
			'title' => esc_html__( 'Preloader', 'gadget-store' ),
			'priority' => 3,
			'panel' => 'gadget_store_general',
		)
	);

	// Preloader Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_preloader_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_preloader_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'gadget-store' ),
			'section'     => 'gadget_store_preloader_section_setting',
			'settings'    => 'gadget_store_preloader_setting',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Scroll To Top Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_scroll_to_top_section_setting', array(
			'title' => esc_html__( 'Scroll To Top', 'gadget-store' ),
			'priority' => 3,
			'panel' => 'gadget_store_general',
		)
	);

	// Scroll To Top Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_scroll_top_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_scroll_top_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroll To Top', 'gadget-store' ),
			'section'     => 'gadget_store_scroll_to_top_section_setting',
			'settings'    => 'gadget_store_scroll_top_setting',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Woocommerce Section
	=========================================*/
	$wp_customize->add_section(
		'woocommerce_section_setting', array(
			'title' => esc_html__( 'Woocommerce Settings', 'gadget-store' ),
			'priority' => 3,
			'panel' => 'gadget_store_general',
		)
	);

	$wp_customize->add_setting(
    	'gadget_store_custom_shop_per_columns',
    	array(
			'default' => '3',
			'sanitize_callback' => 'gadget_store_sanitize_phone_number',
		)
	);	
	$wp_customize->add_control( 
		'gadget_store_custom_shop_per_columns',
		array(
		    'label'   		=> __('Product Per Columns','gadget-store'),
		    'section'		=> 'woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'gadget_store_custom_shop_product_per_page',
    	array(
			'default' => '9',
			'sanitize_callback' => 'gadget_store_sanitize_phone_number',
		)
	);	
	$wp_customize->add_control( 
		'gadget_store_custom_shop_product_per_page',
		array(
		    'label'   		=> __('Product Per Page','gadget-store'),
		    'section'		=> 'woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	// Woocommerce Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_wocommerce_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_wocommerce_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Woocommerce Sidebar', 'gadget-store' ),
			'section'     => 'woocommerce_section_setting',
			'settings'    => 'gadget_store_wocommerce_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
		'sticky_header_section_setting', array(
			'title' => esc_html__( 'Sticky Header Settings', 'gadget-store' ),
			'priority' => 3,
			'panel' => 'gadget_store_general',
		)
	);

	// Sticky Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_sticky_header' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_sticky_header', 
		array(
			'label'	      => esc_html__( 'Hide / Show Sticky Header', 'gadget-store' ),
			'section'     => 'sticky_header_section_setting',
			'settings'    => 'gadget_store_sticky_header',
			'type'        => 'checkbox'
		) 
	);
}

add_action( 'customize_register', 'gadget_store_general_setting' );