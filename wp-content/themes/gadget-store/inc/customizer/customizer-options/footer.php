<?php

function gadget_store_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'gadget_store_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'gadget-store'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'footer_top',
        array(
            'title' 		=> __('Footer Widgets','gadget-store'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'footer_widgets_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'gadget-store' ),
			'section'     => 'footer_top',
			'settings'    => 'footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	// Footer Bottom // 
	$wp_customize->add_section(
        'gadget_store_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','gadget-store'),
			'panel'  		=> 'gadget_store_footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'gadget_store_footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gadget_store_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copytight', 'gadget-store' ),
			'section'     => 'gadget_store_footer_bottom',
			'settings'    => 'gadget_store_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'gadget_store_footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'gadget_store_footer_copyright',
		array(
		    'label'   		=> __('Copytight','gadget-store'),
		    'section'		=> 'gadget_store_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);
}
add_action( 'customize_register', 'gadget_store_footer' );

// Footer selective refresh
function gadget_store_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'gadget_store_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'gadget_store_footer_partials' );

// copyright_content
function gadget_store_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}