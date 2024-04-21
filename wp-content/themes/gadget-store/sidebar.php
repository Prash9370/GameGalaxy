<?php if ( is_active_sidebar('gadget-store-sidebar-primary')) : ?>
 	<div class="col-lg-4">
		<div class="sidebar">
			<?php dynamic_sidebar('gadget-store-sidebar-primary'); ?>
		</div>
	</div>
<?php else : ?>
	<!-- Add your else code here -->
	<div class="col-lg-4">
	    <div class="sidebar">
	    	 <!-- Add your search widget code here -->
		    <div class="widget">
		        <h4 class="widget-title mb-3"><?php echo esc_html('Search', 'gadget-store'); ?></h4>
		        <?php get_search_form(); ?>
		    </div>
		    <!-- Add your archive widget code here -->
            <div class="widget">
                <h4 class="widget-title"><?php echo esc_html('Archives', 'gadget-store'); ?></h4>
                <ul>
                    <?php wp_get_archives(); ?>
                </ul>
            </div>
            <!-- Add your Categories widget code here -->
	    	<div class="widget">
			    <h4 class="widget-title "><?php echo esc_html('Categories List' , 'gadget-store'); ?> </h4>
				<ul>
					<li><?php wp_list_categories(); ?></li>
				</ul>
		    </div>
		    <!-- Add your recent posts widget code here -->
            <div class="widget">
                <h4 class="widget-title"><?php echo esc_html('Recent Posts', 'gadget-store'); ?></h4>
                <ul>
                    <?php
                    $gadget_store_recent_posts = wp_get_recent_posts(array('numberposts' => 5));
                    foreach ($gadget_store_recent_posts as $post) :
                        ?>
                        <li>
                            <a href="<?php echo get_permalink($post['ID']); ?>"><?php echo esc_html($post['post_title']); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
		</div>
	</div>
<?php endif; ?>