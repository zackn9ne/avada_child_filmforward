		</div>
	</div>
	<?php global $smof_data, $social_icons; ?>
	<?php
	$object_id = get_queried_object_id();
	if((get_option('show_on_front') && get_option('page_for_posts') && is_home()) ||
		(get_option('page_for_posts') && is_archive() && !is_post_type_archive()) && !(is_tax('product_cat') || is_tax('product_tag')) || (get_option('page_for_posts') && is_search())) {
		$c_pageID = get_option('page_for_posts');
	} else {
		if(isset($object_id)) {
			$c_pageID = $object_id;
		}

		if(class_exists('Woocommerce')) {
			if(is_shop() || is_tax('product_cat') || is_tax('product_tag')) {
				$c_pageID = get_option('woocommerce_shop_page_id');
			}
		}
	}
	?>
	<?php if(!is_page_template('blank.php')): ?>
	<?php if( ($smof_data['footer_widgets'] && get_post_meta($c_pageID, 'pyre_display_footer', true) != 'no') ||
			  ( ! $smof_data['footer_widgets'] && get_post_meta($c_pageID, 'pyre_display_footer', true) == 'yes') ): ?>
	<footer class="footer-area">
				<?php 
				$column_width = 12 / $smof_data['footer_widgets_columns']; 
				if( $smof_data['footer_widgets_columns'] == '5' ) {
					$column_width = 2;
				}
				?>
			
				<?php if( $smof_data['footer_widgets_columns'] >= 1 ): ?>
				<div class="fusion-column">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 1')):
				endif;
				?>
				<?php endif; ?>
				
				<?php if( $smof_data['footer_widgets_columns'] >= 2 ): ?>
				<div class="fusion-column col <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 2')):
				endif;
				?>
				</div>
				<?php endif; ?>
				
				<?php if( $smof_data['footer_widgets_columns'] >= 3 ): ?>
				<div class="fusion-column col <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 3')):
				endif;
				?>
				</div>
				<?php endif; ?>
				
				<?php if( $smof_data['footer_widgets_columns'] >= 4 ): ?>
				<div class="fusion-column col last <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 4')):
				endif;
				?>
				</div>
				<?php endif; ?>

				<?php if( $smof_data['footer_widgets_columns'] >= 5 ): ?>
				<div class="fusion-column col last <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 5')):
				endif;
				?>
				</div>
				<?php endif; ?>

				<?php if( $smof_data['footer_widgets_columns'] >= 6 ): ?>
				<div class="fusion-column col last <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 6')):
				endif;
				?>
				</div>
				<?php endif; ?>
				<div class="fusion-clearfix"></div>
			</div>
		</div>
	</footer>
	<?php endif; ?>
	<?php if( ($smof_data['footer_copyright'] && get_post_meta($c_pageID, 'pyre_display_copyright', true) != 'no') ||
			  ( ! $smof_data['footer_copyright'] && get_post_meta($c_pageID, 'pyre_display_copyright', true) == 'yes') ): ?>
	<footer id="footer">
		<div class="wrapper">
			<div class="copyright-area-content">
					<ul>
						<li><a href="/category/home_entertainment">Home Entertainment</a></li>
						<li><a href="/category/festivals">Festivals</a></li>
						<li><a href="/category/star-reviews">Top Picks</a></li>
						<li><a href="/about">About</a></li>
						<li><a href="/contact">Contact</a></li>
					</ul>

					<div class="copyright"><?php echo do_shortcode( $smof_data['footer_text'] ); ?></div>
			</div>
		</div>
	</footer>
	<?php endif; ?>
	<?php endif; ?>
	</div><!-- wrapper -->
	
	<?php if( ( ( $smof_data['layout'] == 'Boxed' && get_post_meta( $c_pageID, 'pyre_page_bg_layout', true ) == 'default' ) || get_post_meta( $c_pageID, 'pyre_page_bg_layout', true ) == 'boxed' ) && $smof_data['header_position'] != 'Top' ): ?>
	</div>
	<?php endif; ?>	

	<?php //include_once('style_selector.php'); ?>
	
	<!-- W3TC-include-js-head -->

	<?php wp_footer(); ?>

	<?php echo $smof_data['space_body']; ?>

	<!--[if lte IE 8]>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
	<![endif]-->
</body>
</html>
