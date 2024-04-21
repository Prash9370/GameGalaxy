<?php
/**
 * Displays top header
 *
 * @package Magazine Express
 */
?>

<div class="top-info py-3 text-center text-lg-left text-md-left">
	<div class="container">
        <?php if(get_theme_mod('magazine_express_facebook_url') != ''){ ?>
            <span><strong><?php esc_html_e('TRENDING','magazine-express'); ?></strong> | <marquee class="d-table-cell"><?php echo esc_html(get_theme_mod('magazine_express_trending_article_text','')); ?></marquee></span>
        <?php }?>
	</div>
</div>