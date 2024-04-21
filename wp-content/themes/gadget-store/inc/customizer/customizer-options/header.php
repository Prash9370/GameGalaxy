<?php
function gadget_store_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_site_title_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'gadget-store' ),
			'section'     => 'title_tagline',
			'settings'    => 'gadget_store_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'gadget-store' ),
			'section'     => 'title_tagline',
			'settings'    => 'gadget_store_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'gadget-store'),
		) 
	);

	/*=========================================
	Gadget Store Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','gadget-store'),
			'panel'  		=> 'header_section',
		)
    );    

	/*=========================================
	Top header
	=========================================*/
	$wp_customize->add_section(
        'gadget_store_top_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header','gadget-store'),
			'panel'  		=> 'header_section',
		)
    );

    // Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_header_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'gadget-store' ),
			'section'     => 'gadget_store_top_header',
			'settings'    => 'gadget_store_header_setting',
			'type'        => 'checkbox'
		) 
	);

   	$wp_customize->add_setting(
    	'gadget_store_topheader_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'gadget_store_topheader_text',
		array(
		    'label'   		=> __('Header Text','gadget-store'),
		    'section'		=> 'gadget_store_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

   	$wp_customize->add_setting(
    	'gadget_store_topheader_about_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'gadget_store_topheader_about_text',
		array(
		    'label'   		=> __('Header About Text','gadget-store'),
		    'section'		=> 'gadget_store_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

   	$wp_customize->add_setting(
    	'gadget_store_topheader_about_link',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 
		'gadget_store_topheader_about_link',
		array(
		    'label'   		=> __('Header About Link','gadget-store'),
		    'section'		=> 'gadget_store_top_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'gadget_store_topheader_order_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'gadget_store_topheader_order_text',
		array(
		    'label'   		=> __('Header Track Order Text','gadget-store'),
		    'section'		=> 'gadget_store_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

   	$wp_customize->add_setting(
    	'gadget_store_topheader_order_link',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 
		'gadget_store_topheader_order_link',
		array(
		    'label'   		=> __('Header Track Order Link','gadget-store'),
		    'section'		=> 'gadget_store_top_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'gadget_store_notification',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 
		'gadget_store_notification',
		array(
		    'label'   		=> __('Header Notification Link','gadget-store'),
		    'section'		=> 'gadget_store_top_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'gadget_store_like_option',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 
		'gadget_store_like_option',
		array(
		    'label'   		=> __('Header Like Link','gadget-store'),
		    'section'		=> 'gadget_store_top_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->register_panel_type( 'Gadget_Store_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Gadget_Store_WP_Customize_Section' );

}
add_action( 'customize_register', 'gadget_store_header_settings' );


if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Gadget_Store_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'gadget_store_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Gadget_Store_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'gadget_store_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}