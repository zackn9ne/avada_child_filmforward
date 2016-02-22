<div class="section-title">
			<a href="/category/top-picks"><span>Top Picks</span></a>
		</div>
		<?php rewind_posts(); ?>
		<?php
		//loop4
			$args = [
			'category_name' => 'star-reviews',
			'showposts' => '5',
			'offset' => '3'
			];
			$new_query = new WP_Query($args);
		?>
		<?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
		<?php
		if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
		the_post_thumbnail(array(210, 156));  // Other resolutions
		} ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endwhile; ?>

