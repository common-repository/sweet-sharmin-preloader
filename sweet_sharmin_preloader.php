<?php 
/*
Plugin Name: Sweet Sharmin  Preloader
Plugin URI: http://theforu.byethost7.com/
Description: Sweet Sharmin  Preloader is an awesome preloader that looks fantastic and easy to use. 
Author: Dream Web Lab
Version: 1.0
Author URI: http://gaziyeasin.com
*/
/* Adding Latest jQuery from WordPress */
function sweet_sharmin_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'sweet_sharmin_latest_jquery');
/* Adding Plugin Custom CSS file */
function sweet_sharmin_plugin_styles() {
	wp_register_style( 'preloader-plugin-style', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'preloader-plugin-style' );
}
add_action( 'wp_enqueue_scripts', 'sweet_sharmin_plugin_styles' );

/* HTML Content */
function dwl_preloader_markup() {
?>
	<div id="loader-wrapper">
		<div id="loader"></div>
	</div>
<?php
}
add_action ('wp_enqueue_scripts', 'dwl_preloader_markup');



/* PRELOADER ACTIVATION */
function sweet_sharmin_activation() {
?>
	<script>
		jQuery(window).load(function() {
			jQuery("#loader").delay(300).fadeOut("slow");
			jQuery("#loader-wrapper").delay(1200).fadeOut("slow");
		});
	</script>
<?php
}
add_action ('wp_footer', 'sweet_sharmin_activation');
