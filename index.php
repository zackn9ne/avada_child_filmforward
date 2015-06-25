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
                <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        </div>
    </div>
            <?php endwhile; ?>
        <!-- #content -->

    <div class="col2">
        <div class="section-title advert">
            <span>Advertisement</span>
   </div>
   <?php get_template_part('advert/home-350x250'); ?>
    </div>

    <?php else : ?>

        <!-- #content -->
    </div>
    <div class="col2">
        <div class="section-title advert">
            <span>Advertisement</span>
                    </div>
<?php get_template_part('advert/home-350x250'); ?>

    </div>
        <?php
        //loop1
        $my_query = new WP_Query('posts_per_page=1');
        while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate = $post->ID;
//don't do nothin this is just to pass the do_not_duplicate variable
        endwhile; ?>

        <p>Not Home Page</p><?php endif; ?>
</div>
    <div class="rest-of-posts clearfix">

        <div class="col1">
            <div class="section-title">
                <span>Most Recent Reviews</span>
            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post();
                if ($post->ID == $do_not_duplicate) continue; ?>
                <div class="post">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail(array(440, 440));  // Other resolutions
                    } ?>
                    <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
                    <?php the_excerpt(); ?>

                </div>
            <?php endwhile; endif; ?>
        </div>

        <div class="col2">
            <div class="section-title">
                <span>Home Entertainment</span>
            </div>
            <?php rewind_posts(); ?>
            <?php
            //loop3
            $args = [
                'category_name' => 'home-entertainment',
                'showposts' => '3'
            ];
            $new_query = new WP_Query($args);
            ?>
            <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                <div class="post">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php
                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail(array(440, 440));  // Other resolutions
                } ?>
                <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
                </div>
            <?php endwhile; ?>
            <div class="section-title advert">
                <span>Advertisement</span>
            </div>
            <?php get_template_part('advert/home-350x250'); ?>
            <header class="rec">
                <div>Recommended</div>
            </header>
            <?php rewind_posts(); ?>
            <?php
            //loop4
            $args = [
                'category_name' => 'home-entertainment',
                'showposts' => '3',
                'offset' => '3'
            ];
            $new_query = new WP_Query($args);
            ?>
            <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php
                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail(array(440, 440));  // Other resolutions
                } ?>
                <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
            <?php endwhile; ?>
        </div>
        <?php themefusion_pagination($pages = '', $range = 2); ?>
    </div>
</div>
</div>
<?php get_footer(); ?>

