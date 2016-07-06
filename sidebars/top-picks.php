<div class="section-title">
			<a href="/category/top-picks"><span>Top Picks</span></a>
		</div>

      <?php  wp_reset_query(); ?>
		<?php

		//loop4

$args_top_picks = array( 
'cat' => 5, 
	'showposts' => 5,
	'offset' => 0
	);
query_posts($args_top_picks);


	while ($wp_query->have_posts()) : $wp_query->the_post();
?>
		<?php
		if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
		the_post_thumbnail(array(210, 156));  // Other resolutions
		} ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endwhile; ?>

