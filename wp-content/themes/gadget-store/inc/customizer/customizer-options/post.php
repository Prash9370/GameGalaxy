<?php
function gadget_store_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'gadget_store_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Option', 'gadget-store' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'gadget-store' ),
			'priority' => 1,
			'panel' => 'gadget_store_post',
		)
	);

	// Layouts Post
	$wp_customize->add_setting('gadget_store_blog_layout_option_setting',array(
	  'default' => 'Default',
	  'sanitize_callback' => 'gadget_store_sanitize_choices'
	));
	$wp_customize->add_control(new Gadget_Store_Image_Radio_Control($wp_customize, 'gadget_store_blog_layout_option_setting', array(
	  'type' => 'select',
	  'label' => __('Blog Post Layouts','gadget-store'),
	  'section' => 'gadget_store_archive_post_setting',
	  'choices' => array(
	      'Default' => esc_url(get_template_directory_uri()).'/assets/images/layout-1.png',
	      'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout-2.png',
	))));
		
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
		'gadget_store_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'gadget-store' ),
			'section'     => 'gadget_store_archive_post_setting',
			'settings'    => 'gadget_store_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'gadget-store' ),
			'section'     => 'gadget_store_archive_post_setting',
			'settings'    => 'gadget_store_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'gadget-store' ),
			'section'     => 'gadget_store_archive_post_setting',
			'settings'    => 'gadget_store_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'gadget-store' ),
			'section'     => 'gadget_store_archive_post_setting',
			'settings'    => 'gadget_store_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'gadget-store' ),
			'section'     => 'gadget_store_archive_post_setting',
			'settings'    => 'gadget_store_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'gadget-store' ),
			'section'     => 'gadget_store_archive_post_setting',
			'settings'    => 'gadget_store_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'gadget-store' ),
			'section'     => 'gadget_store_archive_post_setting',
			'settings'    => 'gadget_store_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_single_post', array(
			'title' => esc_html__( 'Single Post', 'gadget-store' ),
			'priority' => 3,
			'panel' => 'gadget_store_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'gadget-store' ),
			'section'     => 'gadget_store_single_post',
			'settings'    => 'gadget_store_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'gadget-store' ),
			'section'     => 'gadget_store_single_post',
			'settings'    => 'gadget_store_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'gadget-store' ),
			'section'     => 'gadget_store_single_post',
			'settings'    => 'gadget_store_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'gadget-store' ),
			'section'     => 'gadget_store_single_post',
			'settings'    => 'gadget_store_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'gadget-store' ),
			'section'     => 'gadget_store_single_post',
			'settings'    => 'gadget_store_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'gadget-store' ),
			'section'     => 'gadget_store_single_post',
			'settings'    => 'gadget_store_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);
	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_single_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_single_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'gadget-store' ),
			'section'     => 'gadget_store_single_post',
			'settings'    => 'gadget_store_single_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);
}

add_action( 'customize_register', 'gadget_store_post_setting' );