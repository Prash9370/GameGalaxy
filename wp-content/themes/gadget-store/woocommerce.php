<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gadget Store
 */

get_header();
?>
<!-- Product Sidebar Section -->
<section id="product" class="product-section my-5 st-py-default">
    <div class="container">
        <div class="row gy-lg-0 gy-5">
			<!--Product Detail-->
			<div id="product-content" class="col-lg-<?php if ( get_theme_mod('gadget_store_wocommerce_sidebar_setting','1')) { echo 8; } else { echo 12; }  ?> ">
				<?php woocommerce_content(); ?>
			</div>
			<!--/End of Blog Detail-->
			<?php if ( get_theme_mod('gadget_store_wocommerce_sidebar_setting','1')): ?>
				<?php get_sidebar(); ?>
			<?php endif ?>
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
<?php get_footer(); ?>

