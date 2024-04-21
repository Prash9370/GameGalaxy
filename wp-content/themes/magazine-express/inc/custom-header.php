<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Magazine Express
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses magazine_express_header_style()
 */
function magazine_express_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'magazine_express_custom_header_args', array(
		'width'                  => 1600,
		'height'                 => 250,
		'flex-width'             => true,
		'flex-height'            => true,
		'header-text'						 => false,
		'wp-head-callback'       => 'magazine_express_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'magazine_express_custom_header_setup' );

if ( ! function_exists( 'magazine_express_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see magazine_express_custom_header_setup().
	 */
	function magazine_express_header_style() {
		$header_text_color = get_header_textcolor(); ?>

		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.main_header {
					background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
					background-position: center top;
				}
			<?php endif; ?>
		</style>

		<?php if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
