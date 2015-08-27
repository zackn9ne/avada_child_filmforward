<?php get_header(); ?>

<div class="wrapper">
	<?php if ( $paged < 2 ) : ?>
	<div class="col1">
		<div class="featured-post">
			<?php
			//loop1
			$my_query = new WP_Query(array(
				'posts_per_page' =>1, 
				'category_name' => 'star-reviews' )
			);

			while ($my_query->have_posts()) : $my_query->the_post();
			$do_not_duplicate = $post->ID; ?>
			<?php
			if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail(); //featured image
			} ?>

			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_excerpt(); ?> 
		</div>
	</div>

	<aside id="sidebar">
		<div class="col2">
			<div class="section-title advert">
				<span>Advertisement</span>
			</div>
			<?php get_template_part('advert/home-350x250'); ?>
		</div>
	</aside>
			<?php endwhile; ?>
	<?php endif; ?>

<div class="rest-of-posts clearfix">
	<div class="col1">
		<div class="section-title">
			<span>More <?php single_cat_title( '', true ); ?></span>
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post();
		if ($post->ID == $do_not_duplicate) continue; ?>
		<div class="post">
			<div class="image-container">
			<?php
			if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail(array(300, 300));  // Other resolutions
			} ?>

			</div>
			<div class="promo-container">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			</div>

		</div>
		<?php endwhile; endif; ?>
	</div>
<aside id="sidebar">
	<div class="col2">
		<?php get_template_part('sidebars/home-entertainment'); ?>
		<div class="section-title advert">
			<span>Advertisement</span>
			<?php get_template_part('advert/home-350x250'); ?>
		</div>
		<?php get_template_part('sidebars/festivals'); ?>
	</div>
</aside>
	
	<?php themefusion_pagination($pages = '', $range = 2); ?>
</div>
</div>
</div>
<?php get_footer(); ?>

