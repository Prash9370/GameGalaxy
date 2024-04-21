<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<?php 
  $magazine_express_year  = get_the_time('Y');
  $magazine_express_month = get_the_time('m');
  $magazine_express_day   = get_the_time('d');
?>

<main id="skip-content">
  <section class="top-slider">
    <div class="image1" slider-loop="<?php echo esc_html(get_theme_mod('magazine_express_slider_loop')); ?>">
      <div class="owl-carousel" role="listbox">
        <?php
          $magazine_express_post_cat1 = get_theme_mod('magazine_express_top_post_category_1','');
          if($magazine_express_post_cat1){
            $magazine_express_page_query1 = new WP_Query(array( 'category_name' => esc_html($magazine_express_post_cat1,'magazine-express')));
            while( $magazine_express_page_query1->have_posts() ) : $magazine_express_page_query1->the_post(); ?>
              <div class="slider-imagebox">
                <?php the_post_thumbnail(); ?>
                <div class="slider-content">
                  <div class="slide-cat">
                    <span><?php the_category() ?></span>
                  </div>
                  <h4><?php the_title(); ?></h4>
                  <a href="<?php echo esc_url( get_day_link( $magazine_express_year, $magazine_express_month, $magazine_express_day)); ?>" class="slide-date"><i class="far fa-calendar-alt mr-2"></i><?php echo esc_html( get_the_date() ); ?></a>
                  <div class="slide-btn my-3"><a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','magazine-express'); ?></a></div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
    <div class="image2" slider-loop="<?php echo esc_html(get_theme_mod('magazine_express_slider_loop')); ?>">
      <div class="owl-carousel" role="listbox">
        <?php
          $magazine_express_post_cat2 = get_theme_mod('magazine_express_top_post_category_2','');
          if($magazine_express_post_cat2){
            $magazine_express_page_query2 = new WP_Query(array( 'category_name' => esc_html($magazine_express_post_cat2,'magazine-express')));
            while( $magazine_express_page_query2->have_posts() ) : $magazine_express_page_query2->the_post(); ?>
              <div class="slider-imagebox">
                <?php the_post_thumbnail(); ?>
                <div class="slider-content">
                  <div class="slide-cat">
                    <span><?php the_category() ?></span>
                  </div>
                  <h4><?php the_title(); ?></h4>
                  <a href="<?php echo esc_url( get_day_link( $magazine_express_year, $magazine_express_month, $magazine_express_day)); ?>" class="slide-date"><i class="far fa-calendar-alt mr-2"></i><?php echo esc_html( get_the_date() ); ?></a>
                  <div class="slide-btn my-3"><a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','magazine-express'); ?></a></div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
    <div class="image3" slider-loop="<?php echo esc_html(get_theme_mod('magazine_express_slider_loop')); ?>">
      <div class="owl-carousel" role="listbox">
        <?php
          $magazine_express_post_cat3 = get_theme_mod('magazine_express_top_post_category_3','');
          if($magazine_express_post_cat3){
            $magazine_express_page_query3 = new WP_Query(array( 'category_name' => esc_html($magazine_express_post_cat3,'magazine-express')));
            while( $magazine_express_page_query3->have_posts() ) : $magazine_express_page_query3->the_post(); ?>
              <div class="slider-imagebox">
                <?php the_post_thumbnail(); ?>
                <div class="slider-content">
                  <div class="slide-cat">
                    <span><?php the_category() ?></span>
                  </div>
                  <h4><?php the_title(); ?></h4>
                  <a href="<?php echo esc_url( get_day_link( $magazine_express_year, $magazine_express_month, $magazine_express_day)); ?>" class="slide-date"><i class="far fa-calendar-alt mr-2"></i><?php echo esc_html( get_the_date() ); ?></a>
                  <div class="slide-btn my-3"><a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','magazine-express'); ?></a></div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <section id="featured-topic" class="py-5">
    <div class="container">
       <?php if(get_theme_mod('magazine_express_featured_category_title')!=''){ ?>
         <h3 class="mb-5 text-center d-table py-2 px-3"><?php echo esc_html(get_theme_mod('magazine_express_featured_category_title','')); ?></h3>
       <?php } ?>
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <div class="row">
            <?php
              $magazine_express_featured_cat1 = get_theme_mod('magazine_express_featured_category_1','');
              if($magazine_express_featured_cat1){
                $magazine_express_page_query4 = new WP_Query(array( 'category_name' => esc_html($magazine_express_featured_cat1,'magazine-express')));
                while( $magazine_express_page_query4->have_posts() ) : $magazine_express_page_query4->the_post(); ?>
                  <div class="col-lg-6 col-md-6">
                    <div class="featured-imagebox mb-4">
                      <?php the_post_thumbnail(); ?>
                      <div class="featured-content px-3">
                        <div class="featured-cat">
                          <span><?php the_category() ?></span>
                        </div>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>" class="featured-date mr-3"><i class="fas fa-user mr-2"></i><?php echo esc_html('By '); the_author(); ?></a>
                        <a href="<?php echo esc_url( get_day_link( $magazine_express_year, $magazine_express_month, $magazine_express_day)); ?>" class="featured-date"><i class="far fa-calendar-alt mr-2"></i><?php echo esc_html( get_the_date() ); ?></a>                    
                      </div>
                    </div>
                  </div>
                <?php endwhile;
              wp_reset_postdata();
            } ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php
            $magazine_express_featured_cat2 = get_theme_mod('magazine_express_featured_category_2','');
            if($magazine_express_featured_cat2){
              $magazine_express_page_query5 = new WP_Query(array( 'category_name' => esc_html($magazine_express_featured_cat2,'magazine-express')));
              while( $magazine_express_page_query5->have_posts() ) : $magazine_express_page_query5->the_post(); ?>
                <div class="box-category mb-3">
                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-5">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="col-lg-7 col-md-7 col-7 px-2 my-3">
                      <div class="featured-cat">
                        <span><?php the_category() ?></span>
                      </div>
                      <h4 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <a href="<?php echo esc_url( get_day_link( $magazine_express_year, $magazine_express_month, $magazine_express_day)); ?>" class="box-date"><i class="far fa-calendar-alt mr-2"></i><?php echo esc_html( get_the_date() ); ?></a>
                    </div>
                  </div>
                </div>
              <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </div>
  </section>  

  <section id="content-section" class="container">
    <?php
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
          the_content();
        endwhile; 
      endif; 
    ?>
  </section>
</main>

<?php get_footer(); ?>