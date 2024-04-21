/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-magazine_express_options-';
		
		// Label
		function magazine_express_customizer_label( id, title ) {

			// Colors

			if ( id === 'magazine_express_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'magazine_express_trending_article_text' || id === 'magazine_express_subscribe_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'magazine_express_preloader_hide' || id === 'magazine_express_sticky_header' || id === 'magazine_express_scroll_hide' || id === 'magazine_express_scroll_top_position' || id === 'magazine_express_products_per_row' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'magazine_express_woocommerce_product_sale' || id === 'magazine_express_woocommerce_related_product_show_hide') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'magazine_express_social_icon_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'magazine_express_top_post_category_1' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
			// Featured Category

			if ( id === 'magazine_express_featured_category_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'magazine_express_footer_bg_image' || id === 'magazine_express_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'magazine_express_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'magazine_express_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'magazine_express_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'magazine_express_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-magazine_express_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

		// Colors
		magazine_express_customizer_label( 'magazine_express_theme_color', 'Theme Color' );
		magazine_express_customizer_label( 'background_color', 'Colors' );
		magazine_express_customizer_label( 'background_image', 'Image' );

		// Site Identity
		magazine_express_customizer_label( 'custom_logo', 'Logo Setup' );
		magazine_express_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		magazine_express_customizer_label( 'magazine_express_trending_article_text', 'Trending Article' );
		magazine_express_customizer_label( 'magazine_express_subscribe_text', 'Button' );

		// General Setting
		magazine_express_customizer_label( 'magazine_express_preloader_hide', 'Preloader' );
		magazine_express_customizer_label( 'magazine_express_sticky_header', 'Sticky Header' );
		magazine_express_customizer_label( 'magazine_express_scroll_hide', 'Scroll To Top' );
		magazine_express_customizer_label( 'magazine_express_scroll_top_position', 'Scroll to top Position' );
		magazine_express_customizer_label( 'magazine_express_products_per_row', 'woocommerce Setting' );
		magazine_express_customizer_label( 'magazine_express_woocommerce_product_sale', 'Woocommerce Product Sale Positions' );
		magazine_express_customizer_label( 'magazine_express_woocommerce_related_product_show_hide', 'Woocommerce Related Products' );

		// Social Icon
		magazine_express_customizer_label( 'magazine_express_social_icon_setting', 'Social Links' );

		//Slider
		magazine_express_customizer_label( 'magazine_express_top_post_category_1', 'Slider' );

		//Header Image
		magazine_express_customizer_label( 'header_image', 'Header Image' );

		//Featured Category
		magazine_express_customizer_label( 'magazine_express_featured_category_title', 'Featured Category' );

		//Footer
		magazine_express_customizer_label( 'magazine_express_footer_bg_image', 'Footer' );
		magazine_express_customizer_label( 'magazine_express_show_hide_copyright', 'Copyright' );

		//Single Post Settings
		magazine_express_customizer_label( 'magazine_express_single_post_thumb', 'Single Post Settings' );
		magazine_express_customizer_label( 'magazine_express_single_post_comment_title', 'Single Post Comment' );

		//Post Settings
		magazine_express_customizer_label( 'magazine_express_post_page_title', 'Post Settings' );

		// Page Setting
		magazine_express_customizer_label( 'magazine_express_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
