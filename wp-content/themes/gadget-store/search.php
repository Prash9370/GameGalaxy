<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Gadget Store
 */

get_header();
?>
<section class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row">
			<?php 
                $gadget_store_search_result_sidebar_setting = get_theme_mod('gadget_store_search_result_sidebar_setting','1');
                $gadget_store_content_class = ($gadget_store_search_result_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';
            ?>
			<div class="<?php echo esc_attr($gadget_store_content_class); ?>">
				<?php if( have_posts() ): ?>
			
					<?php while( have_posts() ) : the_post(); ?>
						<?php get_template_part('template-parts/content/content-post', get_post_format() ); ?>
					<?php endwhile; 
					the_posts_navigation(); ?>
					
				<?php else: ?>
				
					<?php get_template_part('template-parts/content/content','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php if( $gadget_store_search_result_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>	
<?php get_footer(); ?>
