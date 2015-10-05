
		<div class="section-title">
			<span>Recent Reviews</span>
		</div>
		<?php rewind_posts(); ?>
		<?php
		//loop3
			$args = [
			'category_name' => '',
			'showposts' => '5'
			];
			$new_query = new WP_Query($args);
		?>
		<?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
		<div class="post">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php
			if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
		the_post_thumbnail(array(210, 156));  // Other resolutions
			} ?>
		</div>
		<?php endwhile; ?>
