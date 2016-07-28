<?// php if ( is_home() ) : ?>
	      <?php include ('social-div.php'); ?>
	      <?// php endif; ?>

<?php if ( is_active_sidebar( 'home_right_hi' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_hi' ); ?>
	</div>
<?php endif; ?>


	<?php /*---- top picks ---*/ get_template_part('sidebars/top-picks'); ?>



<?php if ( is_active_sidebar( 'home_right_lo' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_lo' ); ?>
	</div>
<?php endif; ?>


	<?php /*----- home ent -----*/ get_template_part('sidebars/home-entertainment'); ?>


