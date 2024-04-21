<?php
function gadget_store_social_media_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Social Media
	=========================================*/
	$wp_customize->add_section(
        'gadget_store_social_media_header',
        array(
        	'priority'      => 3,
            'title' 		=> __('Social Media','gadget-store'),
			'panel'  		=> 'header_section',
		)
    );

   	$wp_customize->add_setting(
    	'gadget_store_social_media_facebook',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'gadget_store_social_media_facebook',
		array(
		    'label'   		=> __('Facebook URL','gadget-store'),
		    'section'		=> 'gadget_store_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'gadget_store_social_media_twitter',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'gadget_store_social_media_twitter',
		array(
		    'label'   		=> __('Twitter URL','gadget-store'),
		    'section'		=> 'gadget_store_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);	

	$wp_customize->add_setting(
    	'gadget_store_social_media_instagram',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'gadget_store_social_media_instagram',
		array(
		    'label'   		=> __('Instagram URL','gadget-store'),
		    'section'		=> 'gadget_store_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'gadget_store_social_media_linkedin',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'gadget_store_social_media_linkedin',
		array(
		    'label'   		=> __('Linkedin URL','gadget-store'),
		    'section'		=> 'gadget_store_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'gadget_store_social_media_youtube',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'gadget_store_social_media_youtube',
		array(
		    'label'   		=> __('Youtube URL','gadget-store'),
		    'section'		=> 'gadget_store_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);
}
add_action( 'customize_register', 'gadget_store_social_media_header_settings' );