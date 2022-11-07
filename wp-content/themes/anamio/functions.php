<?php
function anamio_css() {
	$parent_style = 'specia-parent-style';		
	
	wp_enqueue_style('anamio-default',get_stylesheet_directory_uri() .'/css/colors/default.css');
	wp_dequeue_style('specia-default');
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'anamio-main', get_stylesheet_uri(), array( $parent_style ));
			
	wp_enqueue_script('anamio-custom',get_stylesheet_directory_uri() . '/js/custom.js');
	
}
add_action( 'wp_enqueue_scripts', 'anamio_css',999);



require_once( get_stylesheet_directory() . '/inc/customize/anamio-header-section.php');
require( get_stylesheet_directory() . '/inc/customize/anamio-call-action.php');
require_once( get_stylesheet_directory() . '/inc/customize/anamio-premium.php');
	
	
/**
* Import Options From Specia Theme
*
*/
function anamio_parent_theme_options() {
	$specia_mods = get_option( 'theme_mods_specia' );
	if ( ! empty( $specia_mods ) ) {
		foreach ( $specia_mods as $specia_mod_k => $specia_mod_v ) {
			set_theme_mod( $specia_mod_k, $specia_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'anamio_parent_theme_options' );
	

