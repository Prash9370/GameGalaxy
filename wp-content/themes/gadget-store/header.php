<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>
<body <?php body_class();?> > 
<?php wp_body_open(); ?>
<?php $gadget_store_preloader = get_theme_mod('gadget_store_preloader_setting');
  if($gadget_store_preloader == '1') { ?>
	<div class="loading">
		<div class="loader">
		  <?php esc_html_e( 'Loading', 'gadget-store' ); ?>
		  <span></span>
		</div>
	</div>
<?php } ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gadget-store' ); ?></a>
	
	<?php 
		get_template_part('template-parts/sections/section','header'); 
		
		if ( !is_page_template( 'templates/template-frontpage.php' ) ) {
			gadget_store_breadcrumbs_style();  
		}
	?>
	
	<div id="content" class="gadget-store-content">