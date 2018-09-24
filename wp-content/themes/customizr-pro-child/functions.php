<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION

/**
 * Move the product title for WooCommerce Products
 */
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

/**
 * @return array
 */
function child_thumb_size() {
	$sizeinfo = array( 'width' => 200, 'height' => 200, 'crop' => false );
	return $sizeinfo;
}

add_filter( 'tc_thumb_size', 'child_thumb_size');
add_filter( 'tc_thumb_fpc_size', 'child_thumb_size');

/**
 * @return tc-thumb image size added
 */
function child_theme_setup() {
	add_image_size('tc-thumb', 200, 200, false);
}

add_action( 'after_setup_theme', 'child_theme_setup', 10, 2);
update_option( 'thumbnail_size_w', 200 );
update_option( 'thumbnail_size_h', 200 );
update_option( 'thumbnail_crop', 0 );

/**
 * Customize front page links
 *
add_filter('tc_fp_link_url' , 'my_custom_fp_links', 10 ,2);
//If you are using the featured pages Unlimited Plugin or the Customizr Pro theme, uncomment this line :
add_filter('fpc_link_url' , 'my_custom_fp_links', 10 ,2);
 * 
 **/

/**
 * @param $original_link
 * @param $fp_id
 *
 * @return mixed
 *
function my_custom_fp_links( $original_link , $fp_id ) {

	//assigns a custom link by page id
	$custom_link = array(
		//page id => 'Custom link'
		59 => 'https://newswheel.vta.org/category/headways/',
		29 => 'https://newswheel.vta.org/category/from-the-hub/',
		129 => 'https://newswheel.vta.org/category/announcements/',
		25 => 'https://newswheel.vta.org/category/safety/'
	);

	foreach ($custom_link as $page_id => $link) {
		if ( get_permalink($page_id) == $original_link )
			return $link;
	}
 * 
 **/

/**
 * @param $tag
 *
 * @return mixed
 */
function defer_js_async($tag){

    if (preg_match('%/wp-admin%', $_SERVER['REQUEST_URI'])) {
	    return $tag;
    }

    $scripts_to_async = array('tc','fpu','modernizr','hammer','woocommerce','devicepx','map');

    $scripts_to_exclude = array('jquery.js','jquery-migrate.js');

    foreach($scripts_to_async as $async_script) {
	    if (true == strpos($tag, $async_script)) {
		    return str_replace(' src', ' async="async" src', $tag);
	    } else {
		    foreach ($scripts_to_exclude as $exclude_script) {
			    if (true == strpos($tag, $exclude_script)) {
				    return $tag;
			    } else {
				    return str_replace(' src', ' defer="defer" src', $tag);
			    }
		    }
	    }
    }
}
add_filter( 'script_loader_tag', 'defer_js_async', 10);

/**
 * @param $src
 *
 * @return mixed
 */
function _remove_script_version( $src ) {
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/**
 * Disable Grunt debug live loader
 */
add_filter("tc_live_reload_in_dev_mode" , "__return_false");

/**
 * GravityForms UUID in hidden field
 * @see https://www.gravityhelp.com/forums/topic/guid-entry-id
 */
add_filter("gform_field_value_uuid", "uuid");

/**
 * @param string $prefix
 *
 * @return string
 */
function uuid($prefix = '')
{
	$chars = md5(uniqid(mt_rand(), true));
	$uuid  = substr($chars,0,8) . '-';
	$uuid .= substr($chars,8,4) . '-';
	$uuid .= substr($chars,12,4) . '-';
	$uuid .= substr($chars,16,4) . '-';
	$uuid .= substr($chars,20,12);
	return $prefix . $uuid;
}

/**
 * Unset Cookies for Uploads, Plugins, Themes
 */
function cache_control()
{
	if (isset($_SERVER['REQUEST_URI'])) {
//    $pattern = '%(wp-content.*?(uploads.*?\.(css|js)|plugins.*?\.(css|js)|themes.*?\.(css|js))|wp-includes/js/.*?\.js)%';
		$pattern = '%\.(css|js|png|jpg|jpeg|png|gif|webp|flv|swf|pdf|mp4|mp3|ttf|eot|woot)$%';
		if (!preg_match($pattern, $_SERVER['REQUEST_URI'])) {
//      session_cache_limiter('public');
			header_remove('Cookie');
			header_remove('Set-Cookie');
			header_remove('Pragma');

			$iLastModified = strtotime('2017-07-04 07:11:33');
			$iSecondsToCache = time() + (48 * 60 * 60);
			$sLastModified = gmdate('D, d M Y H:i:s', $iLastModified) . ' GMT';

			if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
			{
				if ($_SERVER['HTTP_IF_MODIFIED_SINCE'] == $sLastModified)
				{
					header('HTTP/1.1 304 Not Modified');
				}
			}
			header_remove('Cache-Control');
			header_remove('Expires');
			header_remove('Last-Modified');

			header('Expires: ' . gmdate('D, d M Y H:i:s', $iSecondsToCache) . ' GMT', true);
			header('Cache-Control: max-age=3600, public, must-revalidate', true);
			header('Last-Modified: ' . $sLastModified, true);
		}
	}
}
add_action('send_headers','cache_control',10);
