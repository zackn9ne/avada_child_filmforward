<?php global $smof_data; ?>
<div class="header-v2">
	<?php if($smof_data['header_left_content'] != 'Leave Empty' || $smof_data['header_right_content'] != 'Leave Empty'): ?>
	<div class="header-social">
		<div class="avada-row">
			<div class="alignleft">
				<?php
				if($smof_data['header_left_content'] == 'Contact Info') {
					get_template_part('framework/headers/header-info');
				} elseif($smof_data['header_left_content'] == 'Social Links') {
					get_template_part('framework/headers/header-social');
				} elseif($smof_data['header_left_content'] == 'Navigation') {
					get_template_part('framework/headers/header-menu');
				}
				?>
			</div>
			<div class="alignright">
				<?php
				if($smof_data['header_right_content'] == 'Contact Info') {
					get_template_part('framework/headers/header-info');
				} elseif($smof_data['header_right_content'] == 'Social Links') {
					get_template_part('framework/headers/header-social');
				} elseif($smof_data['header_right_content'] == 'Navigation') {
					get_template_part('framework/headers/header-menu');
				}
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<header id="header">
		<div class="avada-row" style="padding-top:<?php echo $smof_data['margin_header_top']; ?>;padding-bottom:<?php echo $smof_data['margin_header_bottom']; ?>;">

			</div>
			<?php if($smof_data['ubermenu']): ?>
			<nav id="nav-uber">
			<?php else: ?>
			<nav id="nav" class="nav-holder">
			<?php endif; ?>
				<?php get_template_part('framework/headers/header-main-menu'); ?>
			</nav>
			<?php if($smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu']): ?>
			<div class="mobile-menu-icons">
				<a href="#" class="fusionicon fusionicon-bars"></a>
				<?php if( class_exists('Woocommerce') && $smof_data['woocommerce_cart_link_main_nav'] ): ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" class="fusionicon fusionicon-shopping-cart"></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'classic' && ! $smof_data['ubermenu']): ?>
			<div class="mobile-nav-holder main-menu"></div>
			<?php endif; ?>
		</div>
	</header>
	<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $smof_data['mobile_menu_design'] == 'modern' && ! $smof_data['ubermenu']): ?>
	<div class="mobile-nav-holder main-menu"></div>
	<?php endif; ?>
</div>
