<?php
/**
 * Displays main header
 *
 * @package Magazine Express
 */
?>

<div class="main_header py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-4 align-self-center">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $magazine_express_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $magazine_express_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                              <?php if( get_theme_mod('magazine_express_logo_title',true) != ''){ ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                              <?php } ?>
                            <?php else : ?>
                              <?php if( get_theme_mod('magazine_express_logo_title',true) != ''){ ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                              <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $magazine_express_description = get_bloginfo( 'description', 'display' );
                            if ( $magazine_express_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('magazine_express_theme_description',false) != ''){ ?>
                          <p class="site-description"><?php echo esc_html($magazine_express_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-7 col-md-8 align-self-center">
                <section id="advertise_sec">
                    <?php $magazine_express_advertise_page = array();
                        $magazine_express_mod = intval( get_theme_mod( 'magazine_express_advertise_page' ));
                        if ( 'page-none-selected' != $magazine_express_mod ) {
                            $magazine_express_advertise_page[] = $magazine_express_mod;
                        }
                        if( !empty($magazine_express_advertise_page) ) :
                            $magazine_express_args = array(
                                'post_type' => 'page',
                                'post__in' => $magazine_express_advertise_page,
                                'orderby' => 'post__in'
                            );
                        $magazine_express_query = new WP_Query( $magazine_express_args );
                        if ( $magazine_express_query->have_posts() ) :
                            $i = 1;
                    ?>
                    <?php  while ( $magazine_express_query->have_posts() ) : $magazine_express_query->the_post(); ?>
                        <div class="advertise-box my-3 my-lg-0 my-md-0">
                            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                            <div class="advertise-inner-box px-3">
                                <h3><?php the_title(); ?></h3>
                                <div class="slide-btn"><a href="<?php the_permalink(); ?>"><?php esc_html_e('SHOP NOW','magazine-express'); ?></a></div>
                            </div>
                        </div>
                    <?php $i++; endwhile;
                    wp_reset_postdata();?>
                    <?php else : ?>
                        <div class="no-postfound"></div>
                    <?php endif;
                    endif;?>
                </section>
            </div>
        </div>
    </div>
</div>
