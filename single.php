
<?php get_header(); ?>
<div class="wrapper">
    <div class="col1">

    <div id="post" class="<?php echo $content_class; ?>" style="<?php echo $content_css; ?>">
    <?php if( ( ! $smof_data['blog_pn_nav'] && get_post_meta($post->ID, 'pyre_post_pagination', true) != 'no' ) ||
	      ( $smof_data['blog_pn_nav'] && get_post_meta($post->ID, 'pyre_post_pagination', true) == 'yes' ) ): ?>
   <?php endif; ?>

<?php if( ( $smof_data['social_sharing_box'] && get_post_meta($post->ID, 'pyre_share_box', true) != 'no' ) || 
	  ( ! $smof_data['social_sharing_box'] && get_post_meta($post->ID, 'pyre_share_box', true) == 'yes' ) ):
    $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$sharingbox_soical_icon_options = array (
					 'sharingbox'		=> 'yes',
					 'icon_colors' 		=> $smof_data['sharing_social_links_icon_color'],
					 'box_colors' 		=> $smof_data['sharing_social_links_box_color'],
					 'icon_boxed' 		=> $smof_data['sharing_social_links_boxed'],
					 'icon_boxed_radius' => $smof_data['sharing_social_links_boxed_radius'],
					 'tooltip_placement'	=> $smof_data['sharing_social_links_tooltip_placement'],
					 'linktarget'        => $smof_data['social_icons_new'],
					 'title'				=> wp_strip_all_tags(get_the_title( $post->ID ), true),
					 'description'		=> wp_strip_all_tags(get_the_title( $post->ID ), true),
					 'link'				=> get_permalink( $post->ID ),
					 'pinterest_image'	=> ($full_image) ? $full_image[0] : '',
					 );
?>
<?php endif; ?>

<?php if(have_posts()): the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
<?php
global $smof_data;
$full_image = '';
if( ! post_password_required($post->ID) ): // 1
  if($smof_data['featured_images_single']): // 2
    if( avada_number_of_featured_images() > 0 || get_post_meta( $post->ID, 'pyre_video', true ) ): // 3
      ?>

      <?php endif; // 3 ?>
<?php endif; // 2 ?>
<?php endif; // 1 ?>
<?php if($smof_data['blog_post_title']): ?>
    <h1<?php if( ! $smof_data['disable_date_rich_snippet_pages'] ) { echo ' class="entry-title"'; } ?>><?php the_title(); ?></h1>
    <div class="about-author">
  <h3 class="byline"><?php echo __('By', 'Avada'); ?> <?php the_author_posts_link(); ?> <?php the_date(); ?></h3>			
  <?php elseif( ! $smof_data['disable_date_rich_snippet_pages'] ): ?>
  <span class="entry-title" style="display: none;"><?php the_title(); ?></span>
  <?php endif; ?>
  </div>

  <div class="post-content">

  <?php the_content(); ?>

  <?php avada_link_pages(); ?>
  </div>
  <?php if( ! post_password_required($post->ID) ): ?>



      <!--- old code -->
	 <?php if( ( $smof_data['related_posts'] && get_post_meta($post->ID, 'pyre_related_posts', true ) != 'no' ) ||
		   ( ! $smof_data['related_posts'] && get_post_meta($post->ID, 'pyre_related_posts', true) == 'yes' ) ): ?>
	 <?php $related = fusion_get_related_posts($post->ID, $smof_data['number_related_posts']); ?>
  <?php if($related->have_posts()): ?>
      <div class="related-posts single-related-posts">
	 <div class="fusion-title title"><h2 class="title-heading-left"><?php echo __('Related Posts', 'Avada'); ?></h2><div class="title-sep-container"><div class="title-sep sep-double"></div></div></div>
  <div id="carousel" class="es-carousel-wrapper fusion-carousel-large">
  <div class="es-carousel">
  <ul>
  <?php while($related->have_posts()): $related->the_post(); ?>
	 <?php if(has_post_thumbnail()): ?>
	     <li>
		<div class="image" aria-haspopup="true">
		<?php the_post_thumbnail('related-img'); ?>
	 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('related-img'); ?></a>
	 <?php
	 if(get_post_meta($post->ID, 'pyre_image_rollover_icons', true) == 'link') {
	   $link_icon_css = 'display:inline-block;';
	   $zoom_icon_css = 'display:none;';
	 } elseif(get_post_meta($post->ID, 'pyre_image_rollover_icons', true) == 'zoom') {
  $link_icon_css = 'display:none;';
  $zoom_icon_css = 'display:inline-block;';
} elseif(get_post_meta($post->ID, 'pyre_image_rollover_icons', true) == 'no') {
  $link_icon_css = 'display:none;';
  $zoom_icon_css = 'display:none;';
} else {
  $link_icon_css = 'display:inline-block;';
  $zoom_icon_css = 'display:inline-block;';
}

$icon_url_check = get_post_meta(get_the_ID(), 'pyre_link_icon_url', true); if(!empty($icon_url_check)) {
  $icon_permalink = get_post_meta($post->ID, 'pyre_link_icon_url', true);
} else {
  $icon_permalink = get_permalink($post->ID);
}
?>
<div class="image-extras">
									     <div class="image-extras-content">
									     <?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
<a style="<?php echo $link_icon_css; ?>" class="icon link-icon" href="<?php echo $icon_permalink; ?>">Permalink</a>
									     <?php
									     if(get_post_meta($post->ID, 'pyre_video_url', true)) {
									       $full_image[0] = get_post_meta($post->ID, 'pyre_video_url', true);
									     }
?>
<a style="<?php echo $zoom_icon_css; ?>" class="icon gallery-icon" href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery]">Gallery</a>
									     <h3><a href="<?php echo $icon_permalink; ?>"><?php the_title(); ?></a></h3>
									     </div>
									     </div>
									     </div>
									     </li>
									     <?php endif; endwhile; ?>
									     </ul>
									     </div>
									     <div class="es-nav"><span class="es-nav-prev"></span><span class="es-nav-next"></span></div>
											    </div>
											    </div>
											    <?php wp_reset_postdata(); endif; ?>
											    <?php endif; ?>

											    <?php if( ( $smof_data['author_info'] && get_post_meta($post->ID, 'pyre_author_info', true) != 'no' ) ||
												      ( ! $smof_data['author_info'] && get_post_meta($post->ID, 'pyre_author_info', true) == 'yes' ) ): ?>




												<div class="about-author-container">
												   <div class="description">
												   <?php the_author_meta("description"); ?>
											    </div>
											    </div>

											    <?php get_template_part('tools/related-posts-engine'); ?>
											    <?php endif; ?>

											    <?php  if( ( $smof_data['blog_comments'] && get_post_meta($post->ID, 'pyre_post_comments', true ) != 'no' ) ||
												       ( ! $smof_data['blog_comments'] && get_post_meta($post->ID, 'pyre_post_comments', true) == 'yes' ) ):  ?>
												<?php 
												    wp_reset_query();
comments_template();
?>
<?php  endif;  ?>
<?php endif; ?>
</div>
<?php endif; ?>
</div>

<?php wp_reset_query(); ?>
</div>
<aside id="sidebar" class="col2">
  <div class="section-title advert">
</div><!-- #primary-sidebar -->


<?php get_template_part('sidebars/top-picks'); ?>
<div class="section-title advert">
  <?php if ( is_active_sidebar( 'home_right_lo' ) ) : ?>
   <!-- Kent Lower Rectangle 300x250 -->
      <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'home_right_lo' ); ?>
</div><!-- #primary-sidebar -->
<?php endif; ?>
<?//php get_template_part('advert/home-350x250'); ?>
</div>
<?php get_template_part('sidebars/home-entertainment'); ?>

</aside>
</div>
</div>
<?php get_footer(); ?>
