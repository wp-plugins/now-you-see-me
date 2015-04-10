<?php
/**
 * Plugin Name: Now You See Me!
 * Description: Hide your admin panel like a boss.
 * Version: 1.1.0
 * Author: Jono Herrington
 * Author URI: http://createstopbecreative.com
 * License: GPLv2+
 * Text Domain: Now You See Me
 */

/**
 * Add a custom class to the body element
 *
 * @filter admin_body_class
 *
 * @return string
 */
function nysm_admin_body_class( $classes ) {
	$classes .= ' now-you-see-me ';

	return $classes;
}
add_filter( 'admin_body_class', 'nysm_admin_body_class' );

/**
 * Modify the DOM on all admin screens
 *
 * @filter admin_head
 *
 * @return void
 */
function nysm_admin_head() {
	?>
	<script>
	jQuery( document ).ready( function( $ ) {
		$( document ).keypress( function( e ) {
			if ( 104 === e.which ) {
				$( 'body' ).toggleClass( 'now-you-see-me' );
			}
		});
	});
	</script>
	<style type="text/css">
	body.now-you-see-me #wpbody {
		display: none;
	}
	</style>
	<?php
}
add_action( 'admin_head', 'nysm_admin_head' );
