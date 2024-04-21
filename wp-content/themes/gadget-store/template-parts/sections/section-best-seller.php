<?php 
  $gadget_store_best_seller = get_theme_mod('gadget_store_best_seller_setting','1');
  
  if($gadget_store_best_seller == '1') {

  	$gadget_store_best_seller_heading = get_theme_mod('gadget_store_best_seller_heading');
?>
	<section id="best-seller-section" class="py-5">
		<div class="container">
			<?php if( $gadget_store_best_seller_heading != ''){?>
        <h3 class="mb-5"><?php echo esc_html( apply_filters('gadget_store_topheader', $gadget_store_best_seller_heading)); ?></h3>
      <?php } ?>

			<?php if(class_exists('woocommerce')){ ?>
	      <div class="row">
          <?php
            $gadget_store_args = array(
              'post_type'      => 'product',
              'posts_per_page' => 10,
              'product_cat'    => get_theme_mod('gadget_store_best_seller_product_category')
            );
            $loop = new WP_Query( $gadget_store_args );
            while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="product-box mb-5">
								<?php	global $product; ?>
								<div class="product-image">
									<?php echo woocommerce_get_product_thumbnail(); ?>
								</div>
								<div class="product-content">
									<p><?php echo $product->get_price_html(); ?></p>
									<h4><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
									<div class="product-bottom">
										<p class="discount_amt mb-0">
	                  <?php $percentages = gadget_store_woocommerce_get_product_sale_percentages( $product );
	                    $label = gadget_store_woocommerce_get_product_sale_percentage_label( $percentages, '' );
	                    echo $label;
	                  ?><?php esc_html_e(' Off','gadget-store'); ?> 
	                	</p>
	                	<p class="sale_cart mb-0">
	                    <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
	                  </p>
	                </div>
								</div>
							</div>
						</div>
						<?php
						endwhile;
						wp_reset_query();
        	?>
	      </div>
			<?php }?>
		</div>
	</section>
<?php }?>