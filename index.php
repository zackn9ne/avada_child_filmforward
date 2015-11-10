
<?php get_header(); ?>

<div class="wrapper">
  <div class="col1">
    <?php if (is_front_page() && !is_paged()) : ?>

    <div class="featured-post">
      <?php
	 //loop1
	 $my_query = new WP_Query('posts_per_page=1');
	 while ($my_query->have_posts()) : $my_query->the_post();
      $do_not_duplicate = $post->ID; ?>
      <?php
	 if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
	 the_post_thumbnail(); //featured image
	 } ?>

      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      <?php the_excerpt(); ?> 
    </div>


      <?php endwhile; ?>

      <?php else : ?>
      <!-- not home page nulled area -->
      <div class="rest-of-posts">
	<div class="section-title">
          <span>Most Recent Reviews</span>
	</div>

	<?php
	   //loop1
	   $my_query = new WP_Query('posts_per_page=1');
	   while ($my_query->have_posts()) : $my_query->the_post();
	$do_not_duplicate = $post->ID;
	//don't do nothin this is just to pass the do_not_duplicate variable
	endwhile; ?>

	<?php endif; ?>


	<?php if (have_posts()) : while (have_posts()) : the_post();
	      if ($post->ID == $do_not_duplicate) continue; ?>
	<div class="post">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	  <div class="image-container">
	    <?php
               if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
	       //				the_post_thumbnail(array(300, 300));  // Other resolutions
	       the_post_thumbnail( 'blog-medium' ); 
	       } ?>

          </div>
          <div class="promo-container">
	    <?php the_excerpt(); ?>
          </div>

	</div>
	<?php endwhile; endif; ?>
      </div>

      <?php get_header(); ?>





    <aside id="sidebar" class="col2">

      <?php dynamic_sidebar( 'Blog Sidebar' ); ?> 
      <div class="section-title advert">
	<span>Advertisement</span>
      </div>
      <?php get_template_part('advert/home-350x250'); ?>



      <?php get_template_part('sidebars/home-entertainment'); ?>
      <div class="section-title advert">
	<span>Advertisement</span>
	<?php get_template_part('advert/home-350x250'); ?>
      </div>
      <?php get_template_part('sidebars/top-picks'); ?>

    </aside>



    <?php themefusion_pagination($pages = '', $range = 2); ?>
  </div>
</div>

<?php get_footer(); ?>
