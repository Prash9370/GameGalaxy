<?php
/**
 * Gadget Store Theme Customizer.
 *
 * @package Gadget Store
 */

 if ( ! class_exists( 'Gadget_Store_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Gadget_Store_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'gadget_store_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'gadget_store_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'gadget_store_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'gadget_store_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function gadget_store_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Helper files
			 */
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function gadget_store_customize_preview_js() {
			wp_enqueue_script( 'gadget-store-customizer', GADGET_STORE_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}		
		
		function gadget_store_customizer_script() {
			 wp_enqueue_script( 'gadget-store-customizer-section', GADGET_STORE_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function gadget_store_customizer_settings() {
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-options/socialmedia.php';
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-options/header.php';
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-options/frontpage.php';
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-options/footer.php';
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-options/post.php';
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-options/sidebar-option.php';
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-options/general.php';
			require GADGET_STORE_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Gadget_Store_Customizer::get_instance();