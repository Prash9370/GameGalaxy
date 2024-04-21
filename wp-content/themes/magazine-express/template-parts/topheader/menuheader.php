<?php
/**
 * Displays Menu header
 *
 * @package Magazine Express
 */
$magazine_express_sticky_header = get_theme_mod('magazine_express_sticky_header');
    $magazine_express_data_sticky = "false";
    if ($magazine_express_sticky_header) {
        $magazine_express_data_sticky = "true";
    }
?>
<div class="menu-header" data-sticky="<?php echo esc_attr($magazine_express_data_sticky); ?>">
	<div class="container">
        <div class="row">
        	<div class="col-lg-7 col-md-4 col-sm-2 col-4 align-self-center">
            	<?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
        	</div>
        	<div class="col-lg-2 col-md-4 col-sm-5 col-8 align-self-center">
        		<div class="subscribe-btn my-3">
	        		<?php if(get_theme_mod('magazine_express_subscribe_url') != '' || get_theme_mod('magazine_express_subscribe_text') != ''){ ?>
		                <a href="<?php echo esc_url(get_theme_mod('magazine_express_subscribe_url','')); ?>"><?php echo esc_html(get_theme_mod('magazine_express_subscribe_text','')); ?></a>
		            <?php }?>
	          	</div>
        	</div>
        	<div class="col-lg-3 col-md-4 col-sm-5 align-self-center">
        		 <div class="social-link my-3 text-center text-lg-right text-md-right">
        		  <?php if(get_theme_mod('magazine_express_social_icon_setting') != ''){ ?>
		            <?php if(get_theme_mod('magazine_express_facebook_url') != ''){ ?>
		                <a href="<?php echo esc_url(get_theme_mod('magazine_express_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i></a>
		            <?php }?>
		            <?php if(get_theme_mod('magazine_express_twitter_url') != ''){ ?>
		                <a href="<?php echo esc_url(get_theme_mod('magazine_express_twitter_url','')); ?>"><i class="fab fa-twitter"></i></a>
		            <?php }?>
		            <?php if(get_theme_mod('magazine_express_intagram_url') != ''){ ?>
		                <a href="<?php echo esc_url(get_theme_mod('magazine_express_intagram_url','')); ?>"><i class="fab fa-instagram"></i></a>
		            <?php }?>
		            <?php if(get_theme_mod('magazine_express_linkedin_url') != ''){ ?>
		                <a href="<?php echo esc_url(get_theme_mod('magazine_express_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i></a>
		            <?php }?>
		            <?php if(get_theme_mod('magazine_express_pintrest_url') != ''){ ?>
		                <a href="<?php echo esc_url(get_theme_mod('magazine_express_pintrest_url','')); ?>"><i class="fab fa-pinterest-p"></i></a>
		            <?php }?>
		          <?php }?>
		            <span class="search-box"><a href="#"><i class="fas fa-search"></i></a></span>
		        </div>
        	</div>
        </div>
        <div class="serach_outer">
            <div class="serach_inner">
                <?php get_search_form(); ?>
            </div>
        </div>
	</div>
</div>
