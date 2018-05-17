<?php
/**
 * Giving is Living.
 *
 * This file adds functions to the Giving is Living.
 *
 * @package Giving is Living
 * @author  Joe Cezar
 * @license GPL-2.0+
 * @link    http://www.joecezar.com/
 */

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'genesis-sample', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-sample' ) );

//* Add Image upload and Color select to WordPress Theme Customizer
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//* Include Customizer CSS
include_once( get_stylesheet_directory() . '/lib/output.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.2.3' );

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
	$output = array(
		'mainMenu' => __( 'Menu', 'genesis-sample' ),
		'subMenu'  => __( 'Menu', 'genesis-sample' ),
	);
	wp_localize_script( 'genesis-sample-responsive-menu', 'genesisSampleL10n', $output );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );


//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add Image Sizes
add_image_size( 'featured-image', 720, 400, TRUE );

// Add featured image sizes
add_image_size( 'community-company', 255, 220, true ); 

// Add featured image sizes
add_image_size( 'community-company-about', 180, 180, true ); 

// Add featured image sizes
add_image_size( 'testimonial', 300, 157, true ); 

// Add featured image sizes
add_image_size( 'banner', 870, 350, true ); 

//* Rename primary and secondary navigation menus
add_theme_support( 'genesis-menus' , array( 'primary' => __( 'After Header Menu', 'genesis-sample' ), 'secondary' => __( 'Footer Menu', 'genesis-sample' ) ) );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );


//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

//* Modify size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

//* Modify size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);

 return $tabs;
}

add_theme_support( 'genesis-connect-woocommerce' );

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Custom Data Field

add_action( 'woocommerce_product_options_pricing', 'wc_rrp_product_field' );
function wc_rrp_product_field() {
    woocommerce_wp_text_input( array( 'id' => 'rrp_price', 'class' => 'wc_input_price short', 'label' => __( 'Retail Price', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')' ) );
}

add_action( 'save_post', 'wc_rrp_save_product' );
function wc_rrp_save_product( $product_id ) {
    // If this is a auto save do nothing, we only save when update button is clicked
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;
	if ( isset( $_POST['rrp_price'] ) ) {
		if ( is_numeric( $_POST['rrp_price'] ) )
			update_post_meta( $product_id, 'rrp_price', $_POST['rrp_price'] );
	} else delete_post_meta( $product_id, 'rrp_price' );
}

add_action( 'woocommerce_single_product_summary', 'wc_rrp_show', 50 );
function wc_rrp_show() {
    global $product;
	// Do not show this on variable products
	if ( $product->product_type <> 'variable' ) {
		$rrp = get_post_meta( $product->id, 'rrp_price', true );
		echo '<div class="woocommerce_msrp">';
		_e( ' ', 'woocommerce' );
		echo '<span class="woocommerce-rrp-price">' . woocommerce_price( $rrp ) . '</span>';
		echo '</div>';
	}
}

add_action( 'woocommerce_after_shop_loop_item_title', 'wc_rrp_show' );


function change_featured_image_text( $content ) {
    return $content = str_replace( __( 'Set featured image' ), __( 'Set post thumbnail' ), $content);
}
add_filter( 'admin_post_thumbnail_html', 'change_featured_image_text' );


//////////////////////////////////////////////////////////////
// Add/Change content in the Featured Image meta box
/////////////////////////////////////////////////////////////

add_filter( 'admin_post_thumbnail_html', 'add_change_featured_image_content');
function add_change_featured_image_content( $content ) {
    $content .= '<p><em>This image make as Company Profile</em></p>'; //
  	 
	return str_replace(__('Set featured image'), __('Set Company Logo/Featured image'),$content);
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
 
function woo_archive_custom_cart_button_text() {
 
        return __( 'Add', 'woocommerce' );
 
}

 function tutsplus_excerpt_in_product_archives() {
     
    the_excerpt();
     
}

add_action( 'woocommerce_after_shop_loop_item_title', 'tutsplus_excerpt_in_product_archives', 2);

/*
 * wc_remove_related_products  
 */
function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 

add_filter('option_users_can_register', function($value) {
$script = basename(parse_url($_SERVER['SCRIPT_NAME'], PHP_URL_PATH));

if ($script == 'wp-login.php') {
$value = false;
}

return $value;
}); 


add_action('wc_cpdf_init', 'prefix_custom_product_data_tab_init', 10, 0);
if(!function_exists('prefix_custom_product_data_tab_init')) :

   function prefix_custom_product_data_tab_init(){


     $custom_product_data_fields = array();

     /** Second product data tab starts **/
     /** ===================================== */

     $custom_product_data_fields['branches'] = array(

       array(
             'tab_name'    => __('Branches', 'wc_cpdf'),
       ),

       array(
             'id'          => 'branches_1',
             'type'        => 'text',
             'label'       => __('Branch 1', 'wc_cpdf'),
             'placeholder' => __('Enter Branch 1 Address', 'wc_cpdf'),
             'class'       => 'large',
             'description' => __('Enter Branch 1 Address', 'wc_cpdf'),
             'desc_tip'    => true,
       ),
	   
       array(
             'id'          => 'branches_2',
             'type'        => 'text',
             'label'       => __('Branch 2', 'wc_cpdf'),
             'placeholder' => __('Enter Branch 2 Address', 'wc_cpdf'),
             'class'       => 'large',
             'description' => __('Enter Branch 2 Address', 'wc_cpdf'),
             'desc_tip'    => true,
       ),
	   
       array(
             'id'          => 'branches_2',
             'type'        => 'text',
             'label'       => __('Branch 3', 'wc_cpdf'),
             'placeholder' => __('Enter Branch 3 Address', 'wc_cpdf'),
             'class'       => 'large',
             'description' => __('Enter Branch 3 Address', 'wc_cpdf'),
             'desc_tip'    => true,
       )

     );

     return $custom_product_data_fields;

   }

endif;

?>

