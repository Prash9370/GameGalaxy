<?php
/**
 * Magazine Express functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magazine Express
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Magazine_Express_Loader.php' );

$magazine_express_loader = new \WPTRT\Autoload\Magazine_Express_Loader();

$magazine_express_loader->magazine_express_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$magazine_express_loader->magazine_express_register();

if ( ! function_exists( 'magazine_express_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magazine_express_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'woocommerce' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('magazine-express-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','magazine-express' ),
	        'footer'=> esc_html__( 'Footer Menu','magazine-express' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'magazine_express_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_magazine_express_dismissable_notice', 'magazine_express_dismissable_notice');

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'magazine_express_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magazine_express_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magazine_express_content_width', 1170 );
}
add_action( 'after_setup_theme', 'magazine_express_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magazine_express_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'magazine-express' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'magazine-express' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'magazine-express' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'magazine-express' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'magazine-express' ),
		'id'            => 'magazine-express-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'magazine-express' ),
		'id'            => 'magazine-express-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'magazine-express' ),
		'id'            => 'magazine-express-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'magazine_express_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function magazine_express_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'poppins',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'magazine-express-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css',get_template_directory_uri() . '/assets/css/bootstrap.css');

	wp_enqueue_style( 'magazine-express-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'magazine-express-style',$magazine_express_theme_css );

	wp_style_add_data('magazine-express-basic-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-style',get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

	wp_enqueue_style( 'owl.carousel-style',get_template_directory_uri().'/assets/css/owl.carousel.css' );

    wp_enqueue_script('owl.carousel-js',get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

    wp_enqueue_script('magazine-express-theme-js',get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magazine_express_scripts' );

/**
 * Enqueue theme color style.
 */
function magazine_express_theme_color() {

    $magazine_express_theme_color_css = '';
    $magazine_express_theme_color_one = get_theme_mod('magazine_express_theme_color_one');
    $magazine_express_theme_color_two = get_theme_mod('magazine_express_theme_color_two');
     $magazine_express_preloader_bg_color = get_theme_mod('magazine_express_preloader_bg_color');
    $magazine_express_preloader_dot_1_color = get_theme_mod('magazine_express_preloader_dot_1_color');
    $magazine_express_preloader_dot_2_color = get_theme_mod('magazine_express_preloader_dot_2_color');
    $magazine_express_logo_max_height = get_theme_mod('magazine_express_logo_max_height');

  	if(get_theme_mod('magazine_express_logo_max_height') == '') {
		$magazine_express_logo_max_height = '24';
	}

    if(get_theme_mod('magazine_express_preloader_bg_color') == '') {
		$magazine_express_preloader_bg_color = '#000';
	}
	if(get_theme_mod('magazine_express_preloader_dot_1_color') == '') {
		$magazine_express_preloader_dot_1_color = '#fff';
	}
	if(get_theme_mod('magazine_express_preloader_dot_2_color') == '') {
		$magazine_express_preloader_dot_2_color = '#ff83af';
	}

	$magazine_express_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($magazine_express_logo_max_height).'px;
	 	}
		.top-info, .menu-header, #featured-topic,#colophon,.serach_inner,.pro-button a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,#button:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.main-navigation .sub-menu > li > a:hover,a.added_to_cart.wc-forward:hover{
			background: '.esc_attr($magazine_express_theme_color_one).';
		}
		.woocommerce .star-rating span::before{
			color: '.esc_attr($magazine_express_theme_color_one).';
		}
		.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote{
			border-color: '.esc_attr($magazine_express_theme_color_one).';
		}
		.sticky .entry-title::before,.sidebar h5,#button,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.serach_inner [type="submit"],.main-navigation .sub-menu,.comment-respond input#submit,.woocommerce .woocommerce-ordering select,.pro-button a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.slide-btn a:hover,.wp-block-button__link,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.slide-cat a, .featured-cat a,.sidebar input[type="submit"], .sidebar button[type="submit"],.toggle-nav i,.sidebar .tagcloud a:hover,a.added_to_cart.wc-forward{
			background: '.esc_attr($magazine_express_theme_color_two).';
		}
		@media screen and (max-width:1000px){
	         .sidenav #site-navigation {
	        background: '.esc_attr($magazine_express_theme_color_two).';
	 		}
		}
		a:hover,.main-navigation .menu > li > a:hover,.sidebar ul li a:hover,p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce-message::before, .woocommerce-info::before,.top-info strong,.subscribe-btn a,.slide-btn a,#featured-topic h3,.woocommerce ul.products li.product .price,#colophon a:hover, #colophon a:focus{
			color: '.esc_attr($magazine_express_theme_color_two).';
		}
		.woocommerce-message, .woocommerce-info,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover{
			border-color: '.esc_attr($magazine_express_theme_color_two).';
		}
		.loading{
			background-color: '.esc_attr($magazine_express_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($magazine_express_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($magazine_express_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'magazine-express-style',$magazine_express_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'magazine_express_theme_color' );

/**
 * Enqueue S Header.
 */
function magazine_express_sticky_header() {

  $magazine_express_sticky_header = get_theme_mod('magazine_express_sticky_header');

  $magazine_express_custom_style= "";

  if($magazine_express_sticky_header != true){

    $magazine_express_custom_style .='.stick_header{';

      $magazine_express_custom_style .='position: static;';

    $magazine_express_custom_style .='}';
  }

  wp_add_inline_style( 'magazine-express-style',$magazine_express_custom_style );

}
add_action( 'wp_enqueue_scripts', 'magazine_express_sticky_header' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*dropdown page sanitization*/
function magazine_express_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function magazine_express_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*radio button sanitization*/
function magazine_express_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/*checkbox sanitization*/
function magazine_express_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

//SELECT
function magazine_express_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function magazine_express_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function magazine_express_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'magazine_express_loop_columns');
if (!function_exists('magazine_express_loop_columns')) {
	function magazine_express_loop_columns() {
		$columns = get_theme_mod( 'magazine_express_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

/**
 * Get CSS
 */

function magazine_express_getpage_css($hook) {
	wp_enqueue_script( 'magazine-express-admin-script', get_template_directory_uri() . '/inc/admin/js/magazine-express-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'magazine-express-admin-script', 'magazine_express_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_magazine-express-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'magazine-express-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'magazine_express_getpage_css' );

if ( ! defined( 'MAGAZINE_EXPRESS_CONTACT_SUPPORT' ) ) {
define('MAGAZINE_EXPRESS_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/magazine-express','magazine-express'));
}
if ( ! defined( 'MAGAZINE_EXPRESS_REVIEW' ) ) {
define('MAGAZINE_EXPRESS_REVIEW',__('https://wordpress.org/support/theme/magazine-express/reviews/#new-post','magazine-express'));
}
if ( ! defined( 'MAGAZINE_EXPRESS_LIVE_DEMO' ) ) {
define('MAGAZINE_EXPRESS_LIVE_DEMO',__('https://www.themagnifico.net/demo/magazine-express/','magazine-express'));
}
if ( ! defined( 'MAGAZINE_EXPRESS_GET_PREMIUM_PRO' ) ) {
define('MAGAZINE_EXPRESS_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/magazine-wordpress-theme/','magazine-express'));
}
if ( ! defined( 'MAGAZINE_EXPRESS_PRO_DOC' ) ) {
define('MAGAZINE_EXPRESS_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/magazine-express-pro-doc/','magazine-express'));
}
if ( ! defined( 'MAGAZINE_EXPRESS_FREE_DOC' ) ) {
define('MAGAZINE_EXPRESS_FREE_DOC',__('https://themagnifico.net/eard/wathiqa/magazine-express-free-doc/','magazine-express'));
}

add_action('admin_menu', 'magazine_express_themepage');
function magazine_express_themepage(){

	$magazine_express_theme_test = wp_get_theme();
	
	$magazine_express_theme_info = add_theme_page( __('Theme Options','magazine-express'), __('Theme Options','magazine-express'), 'manage_options', 'magazine-express-info.php', 'magazine_express_info_page' );
}

function magazine_express_info_page() {
	$user = wp_get_current_user();
	$magazine_express_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap magazine-express-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','magazine-express'); ?><?php echo esc_html( $magazine_express_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "magazine-express"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Magazine Express , feel free to contact us for any support regarding our theme.", "magazine-express"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "magazine-express"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "magazine-express"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "magazine-express"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "magazine-express"); ?>
						</a></p>
					</div>
				</div>
			</div>
				
		   <div class="feature-section three-col">
			    <div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "magazine-express"); ?></h3>
						<p><?php esc_html_e("If You love Magazine Express theme then we would appreciate your review about our theme.", "magazine-express"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "magazine-express"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "magazine-express"); ?></h3>
						<p><?php esc_html_e("Check out the extensive documentation for the theme. The manual contains all the information required for setting the Total theme.", "magazine-express"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "magazine-express"); ?>
						</a></p>
					</div>
				</div>
			</div>
		
		<hr>
		<h2><?php esc_html_e("Free Vs Premium","magazine-express"); ?></h2>
		<div class="magazine-express-button-container">
			<a target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "magazine-express"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "magazine-express"); ?>
			</a>
		</div>
		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "magazine-express"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "magazine-express"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "magazine-express"); ?></strong></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "magazine-express"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "magazine-express"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "magazine-express"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Premium Support", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content", "magazine-express"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="magazine-express-button-container">
			<a target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "magazine-express"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function magazine_express_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function magazine_express_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'magazine_express_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'magazine-express'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'magazine-express'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=magazine-express-info.php' )); ?>"><?php esc_html_e( 'Get started', 'magazine-express' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'magazine-express' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( MAGAZINE_EXPRESS_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'magazine-express' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'magazine_express_deprecated_hook_admin_notice' );

function magazine_express_switch_theme() {
    delete_user_meta(get_current_user_id(), 'magazine_express_dismissable_notice');
}
add_action('after_switch_theme', 'magazine_express_switch_theme');
function magazine_express_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'magazine_express_dismissable_notice', true);
    die();
}