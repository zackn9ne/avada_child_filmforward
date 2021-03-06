<?php
/** avada child ok **/
function avada_child_scripts() {
	if ( ! is_admin() && ! in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
		$theme_info = wp_get_theme();
		wp_enqueue_style( 'avada-child-stylesheet', get_template_directory_uri() . '/style.css', array(), $theme_info->get( 'Version' ) );
	}
}
add_action('wp_enqueue_scripts', 'avada_child_scripts');

function enque_bitchin_stuff(){
	//array for dependancy management
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'underscore' );
	wp_enqueue_script( 'backbone', array('underscore') );
	wp_enqueue_script( 'custom',get_stylesheet_directory_uri() . '/js/custom.js', array('backbone') );
}
add_action( 'wp_enqueue_scripts', 'enque_bitchin_stuff');

/**
 * Register our sidebars and widgetized areas.
 *
 */
if ( function_exists('register_sidebar') ) {

	register_sidebar( array(
				'name'          => 'Film-Forward Top Center',
				'id'            => 'home_top_1',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
			       ) );

	register_sidebar( array(
				'name'          => 'Film-Forward Sidebar Hi',
				'id'            => 'home_right_hi',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
			       ) );
	register_sidebar( array(
				'name'          => 'Film-Forward Sidebar Lo',
				'id'            => 'home_right_lo',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
			       ) );
}

/**
 * Register our sidebars and widgetized areas.
 *
 */

/** do stuff with thumbnail **/

add_image_size( 'full-width-ratio', 600, 9999 );
add_image_size( 'full-width-crop', 600, 300, true );

