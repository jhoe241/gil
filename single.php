<?php
/**
 * This file adds the Single Post Template to any Genesis child theme.
 *
 * @author Brad Dalton
 * @example  http://wpsites.net/
 * @copyright 2014 WP Sites
 */
//* Add custom body class to the head
add_filter( 'body_class', 'single_posts_body_class' );
function single_posts_body_class( $classes ) {
   $classes[] = 'custom-single';
   return $classes;
   
}
// Force content-sidebar layout setting
add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );
//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
//* Run the Genesis loop
genesis();