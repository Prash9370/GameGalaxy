</div>
<footer class="footer-area">  
   <div class="container"> 
		<?php $footer_widgets_setting = get_theme_mod('footer_widgets_setting','1');
		do_action('gadget_store_footer_above'); 
			if ( is_active_sidebar( 'gadget-store-footer-widget-area' ) ) { 
				if( $footer_widgets_setting != ''){?> ?>	
				<div class="row footer-row"> 
					<?php dynamic_sidebar( 'gadget-store-footer-widget-area' ); ?>
				</div>  
			<?php } ?>
		<?php }?>
	</div>
	
	<?php 
		$gadget_store_footer_copyright = get_theme_mod('gadget_store_footer_copyright','');
	?>
	<?php $gadget_store_footer_copyright_setting = get_theme_mod('gadget_store_footer_copyright_setting','1');
	 if( $gadget_store_footer_copyright_setting != ''){?> 
	<div class="copy-right"> 
		<div class="container">
			<p class="copyright-text">
				<?php
					echo esc_html( apply_filters('gadget_store_footer_copyright',($gadget_store_footer_copyright)));
			    ?>
				<?php if($gadget_store_footer_copyright == "") { ?>
						<?php
						   echo esc_html( 'Copyright &copy; 2024,');
						?>
						<a href="https://www.seothemesexpert.com/wordpress/free-gadget-wordpress-theme/" target="blank">
							<?php
							   echo esc_html( 'Gadget Store');
							?>
						</a>
						<span> | </span>
						<a href="https://wordpress.org/">
							<?php
							   echo esc_html( 'WordPress Theme');
							?>
				<?php } ?>
			</p>
		</div>
	</div>
	<?php }?>
	<?php $gadget_store_scroll_top = get_theme_mod('gadget_store_scroll_top_setting','1');
      if($gadget_store_scroll_top == '1') { ?>
		<a id="scrolltop"><span>TOP<span></a>
	<?php } ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
