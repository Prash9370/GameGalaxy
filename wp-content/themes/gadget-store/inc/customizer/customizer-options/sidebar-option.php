<?php
function gadget_store_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'gadget_store_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Option', 'gadget-store' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Option', 'gadget-store' ),
			'priority' => 1,
			'panel' => 'gadget_store_sidebar',
		)
	);
	
	// Archive Post Settings 
	$wp_customize->add_setting(
		'archive_post_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gadget_store_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'archive_post_settings',
		array(
			'type' => 'hidden',
			'label' => __('All Sidebar Setting','gadget-store'),
			'section' => 'gadget_store_sidebar_settings',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'gadget-store' ),
			'section'     => 'gadget_store_sidebar_settings',
			'settings'    => 'gadget_store_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'gadget-store' ),
			'section'     => 'gadget_store_sidebar_settings',
			'settings'    => 'gadget_store_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'gadget-store' ),
			'section'     => 'gadget_store_sidebar_settings',
			'settings'    => 'gadget_store_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'gadget-store' ),
			'section'     => 'gadget_store_sidebar_settings',
			'settings'    => 'gadget_store_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'gadget-store' ),
			'section'     => 'gadget_store_sidebar_settings',
			'settings'    => 'gadget_store_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'gadget-store' ),
			'section'     => 'gadget_store_sidebar_settings',
			'settings'    => 'gadget_store_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);
}

add_action( 'customize_register', 'gadget_store_sidebar_setting' );