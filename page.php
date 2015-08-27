<?php get_header(); ?>

<div class="wrapper" style="<?php echo $content_css; ?>">
<?php
if(have_posts()): the_post();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php echo avada_render_rich_snippets_for_pages(); ?>
<div class="post-content">
<?php the_content(); ?>
<?php the_action(); ?>

<?php avada_link_pages(); ?>
</div>
<?php endif; ?>
<?php get_footer(); ?>
