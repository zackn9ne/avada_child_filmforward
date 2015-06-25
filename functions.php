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


