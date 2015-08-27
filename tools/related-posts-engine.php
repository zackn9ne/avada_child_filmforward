
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
			<?php if($smof_data['image_rollover']): ?>
			<?php the_post_thumbnail('related-img'); ?>
			<?php else: ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('related-img'); ?></a>
			<?php endif; ?>
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
