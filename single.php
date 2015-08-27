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
			<?php elseif( ! $smof_data['disable_date_rich_snippet_pages'] ): ?>
			<span class="entry-title" style="display: none;"><?php the_title(); ?></span>
			<?php endif; ?>
			
			<div class="post-content">
			<?php echo avada_render_post_metadata( 'single' ); ?>
		<div class="fusion-sharing-box share-box">
			<h4><?php echo __('Share' , 'Avada'); ?></h4>
			<?php echo $social_icons->render_social_icons( $sharingbox_soical_icon_options ); ?>
			</div>	
			<?php the_content(); ?>
<div class="fusion-sharing-box share-box">
			<h4><?php echo __('Share' , 'Avada'); ?></h4>
			<?php echo $social_icons->render_social_icons( $sharingbox_soical_icon_options ); ?>
			</div>
			<?php avada_link_pages(); ?>
			</div>
			<?php if( ! post_password_required($post->ID) ): ?>

			<?php if( ( $smof_data['author_info'] && get_post_meta($post->ID, 'pyre_author_info', true) != 'no' ) ||
					( ! $smof_data['author_info'] && get_post_meta($post->ID, 'pyre_author_info', true) == 'yes' ) ): ?>



			<div class="about-author">
			<h2><?php echo __('By', 'Avada'); ?> <?php the_author_posts_link(); ?></h2><div class="title-sep-container"><div class="title-sep sep-double"></div></div></div>
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
<aside id="sidebar">
<div class="col2">
<div class="section-title advert">
<span>Advertisement</span>
<?php get_template_part('advert/home-350x250'); ?>
</div>

<?php get_template_part('sidebars/home-entertainment'); ?>

</aside>
</div>
</div>
<?php get_footer(); ?>
