<?php 
  $gadget_store_slider = get_theme_mod('gadget_store_slider_setting','1');
  
  if($gadget_store_slider == '1') {
?>
<section id="slider-section" class="slider-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <?php $gadget_store_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'gadget_store_slider' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $gadget_store_pages[] = $mod;
              }
            }
            if( !empty($gadget_store_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $gadget_store_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){ ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                <?php }else { ?><div class="slider-color-box"></div> <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
                    <div class="read-btn">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html('Shop Now','gadget-store'); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
          <i class="fas fa-angle-left" aria-hidden="true"></i>
          <span class="screen-reader-text"><?php echo esc_html('Previous','gadget-store'); ?></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
          <i class="fas fa-angle-right" aria-hidden="true"></i>
          <span class="screen-reader-text"><?php echo esc_html('Next','gadget-store'); ?></span>
          </button>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="slider-post-box1">
          <?php $gadget_store_pages = array();
            $mod = intval( get_theme_mod( 'gadget_store_slide_post1' ));
            if ( 'page-none-selected' != $mod ) {
              $gadget_store_pages[] = $mod;
            }
            if( !empty($gadget_store_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $gadget_store_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
          ?>        
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="slider-post mb-3">
              <?php if(has_post_thumbnail()){ ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              <?php }else { ?><div class="slider-color-box"></div> <?php } ?>
              <div class="slider-post-content">
                <h3><?php the_title(); ?></h3>
                <p><?php echo esc_html(wp_trim_words(get_the_content(),'8') );?></p>
                <a href="<?php the_permalink(); ?>"><?php echo esc_html('Shop Now','gadget-store'); ?></a>
              </div>
            </div>
          <?php endwhile; 
          wp_reset_postdata();?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
        </div>
        <!-- slider post 2 -->
        <div class="slider-post-box2">
          <?php $gadget_store_pages = array();
            $mod = intval( get_theme_mod( 'gadget_store_slide_post2' ));
            if ( 'page-none-selected' != $mod ) {
              $gadget_store_pages[] = $mod;
            }
            if( !empty($gadget_store_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $gadget_store_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
          ?>        
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="slider-post">
              <?php if(has_post_thumbnail()){ ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              <?php }else { ?><div class="slider-color-box"></div> <?php } ?>
              <div class="slider-post-content">
                <h3><?php the_title(); ?></h3>
                <p><?php echo esc_html(wp_trim_words(get_the_content(),'8') );?></p>
                <a href="<?php the_permalink(); ?>"><?php echo esc_html('Shop Now','gadget-store'); ?></a>
              </div>
            </div>
          <?php endwhile; 
          wp_reset_postdata();?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>