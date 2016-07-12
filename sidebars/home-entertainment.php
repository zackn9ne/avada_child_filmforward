
<div class="section-title">
			<a href="/category/home-entertainment"><span>DVD/Streaming/On Demand</span></a>
		</div>

      <?php  wp_reset_query(); ?>
<?php
//loop4

$args_ondemand = array( 
'cat' => 13, 
	'showposts' => 5,
	'offset' => 0
	);
query_posts($args_ondemand);
	while ($wp_query->have_posts()) : $wp_query->the_post();

	?>
<div class="content-tile">
	<?php
	if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
	  //		the_post_thumbnail(array(210, 156));  // Other resolutions
	  //	  the_post_thumbnail(full-width-crop);  // Other resolutions
	    the_post_thumbnail(medium);  // Other resolutions
	} ?>
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div>
<?php endwhile; ?>
