<?php
function gadget_store_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'gadget_store_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'gadget-store' ),
		)
	);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_slider_section', array(
			'title' => esc_html__( 'Slider Section', 'gadget-store' ),
			'priority' => 13,
			'panel' => 'gadget_store_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'gadget_store_slider_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'gadget_store_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'gadget_store_slider_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'gadget-store' ),
			'section'     => 'gadget_store_slider_section',
			'settings'    => 'gadget_store_slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Slider 1
	$wp_customize->add_setting( 
    	'gadget_store_slider1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'gadget_store_slider1',
		array(
		    'label'   		=> __('Slider 1','gadget-store'),
		    'section'		=> 'gadget_store_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		

	// Slider 2
	$wp_customize->add_setting(
    	'gadget_store_slider2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'gadget_store_slider2',
		array(
		    'label'   		=> __('Slider 2','gadget-store'),
		    'section'		=> 'gadget_store_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 3
	$wp_customize->add_setting(
    	'gadget_store_slider3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'gadget_store_slider3',
		array(
		    'label'   		=> __('Slider 3','gadget-store'),
		    'section'		=> 'gadget_store_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	

	// Slider Post 1
	$wp_customize->add_setting(
    	'gadget_store_slide_post1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'gadget_store_slide_post1',
		array(
		    'label'   		=> __('Post 1','gadget-store'),
		    'section'		=> 'gadget_store_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	// Slider Post 2
	$wp_customize->add_setting(
    	'gadget_store_slide_post2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'gadget_store_slide_post2',
		array(
		    'label'   		=> __('Post 2','gadget-store'),
		    'section'		=> 'gadget_store_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);


	/*=========================================
	Best Seller Product Section
	=========================================*/
	$wp_customize->add_section(
		'gadget_store_product_section', array(
			'title' => esc_html__( 'Best Seller Section', 'gadget-store' ),
			'priority' => 13,
			'panel' => 'gadget_store_frontpage_sections',
		)
	);

	// heading
	$wp_customize->add_setting( 
    	'gadget_store_best_seller_heading',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'gadget_store_best_seller_heading',
		array(
		    'label'   		=> __('Heading','gadget-store'),
		    'section'		=> 'gadget_store_product_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$gadget_store_args = array(
	 'type'                     => 'product',
	 'child_of'                 => 0,
	 'parent'                   => '',
	 'orderby'                  => 'term_group',
	 'order'                    => 'ASC',
	 'hide_empty'               => false,
	 'hierarchical'             => 1,
	 'number'                   => '',
	 'taxonomy'                 => 'product_cat',
	 'pad_counts'               => false
	);
	$categories = get_categories( $gadget_store_args );
	$gadget_store_cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
				$default = $category->slug;
				$i++;
		}
		$gadget_store_cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting(
		'gadget_store_best_seller_product_category',array(
			'sanitize_callback' => 'gadget_store_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'gadget_store_best_seller_product_category',array(
		'type'    => 'select',
		'choices' => $gadget_store_cats,
		'label' => __('Select Product Category','gadget-store'),
		'section' => 'gadget_store_product_section',
		)
	);
}

add_action( 'customize_register', 'gadget_store_blog_setting' );

// service selective refresh
function gadget_store_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'gadget_store_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'gadget_store_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'gadget_store_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'gadget_store_blog_section_partials' );

// blog_title
function gadget_store_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function gadget_store_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function gadget_store_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}