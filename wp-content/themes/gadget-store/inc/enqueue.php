<?php

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'gadget-store-customize-section-button',
		get_theme_file_uri( 'assets/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);
	wp_localize_script(
		'gadget-store-customize-section-button',
		'gadget_store_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		)
	);

	wp_enqueue_style(
		'gadget-store-customize-section-button',
		get_theme_file_uri( 'assets/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

 /**
 * Enqueue scripts and styles.
 */
function gadget_store_scripts() {
	
	// Styles	 

	wp_enqueue_style('all-min',get_template_directory_uri().'/assets/css/all.min.css');

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
		
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('gadget-store-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('gadget-store-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('gadget-store-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'gadget-store-style', get_stylesheet_uri() );
	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('gadget-store-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gadget_store_scripts' );

//Admin Enqueue for Admin
function gadget_store_admin_enqueue_scripts(){
	wp_enqueue_style('gadget-store-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
	wp_enqueue_script('dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'gadget_store_admin_enqueue_scripts' );

// Function to enqueue custom CSS
function gadget_store_enqueue_custom_css() {
    // Define a unique handle for your inline stylesheet
    $handle = 'gadget-store-style';
    
    // Get the generated custom CSS
    $gadget_store_custom_css = "";

    $gadget_store_blog_layouts = get_theme_mod('gadget_store_blog_layout_option_setting', 'Default');
    if ($gadget_store_blog_layouts == 'Default') {
        $gadget_store_custom_css .= '.blog-item{';
        $gadget_store_custom_css .= 'text-align:center;';
        $gadget_store_custom_css .= '}';
    } elseif ($gadget_store_blog_layouts == 'Left') {
        $gadget_store_custom_css .= '.blog-item{';
        $gadget_store_custom_css .= 'text-align:Left;';
        $gadget_store_custom_css .= '}';
    }

    // Enqueue the inline stylesheet
    wp_add_inline_style($handle, $gadget_store_custom_css);
}

// Hook the function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'gadget_store_enqueue_custom_css');