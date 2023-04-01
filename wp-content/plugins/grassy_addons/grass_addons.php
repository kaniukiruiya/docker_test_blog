<?php
/**
* Plugin Name: Grassy Addons
* Plugin URI: https://codecanyon.net/user/rs-theme
* Description: by Grassy Addons plugin
* Version: 1.0
* Author: RS Theme
* Author URI: http://www.rstheme.com
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die( 'You shouldnt be here' );
}

/**
* Function when plugin is activated
*
* @param void
*
*/
//Including file that manages all template

//All Post type include here

$dir = plugin_dir_path( __FILE__ );
//For team
require_once $dir .'/inc/team/team.php';

//For portfolio
require_once $dir .'/inc/portfolio/portfolio.php';

//For client
require_once $dir .'/inc/client/client.php';

//For testimonail
require_once $dir .'/inc/testimonial/vc_testimonial.php';
require_once $dir . '/inc/testimonial/clt_testimonail_shortcode.php';
require_once $dir .'/inc/testimonial/meta-box.php';

//shordcode 
require_once $dir .'/inc/vc_addon/grassy_call_toaction.php';
require_once $dir .'/inc/vc_addon/grassy_client.php';
require_once $dir .'/inc/vc_addon/grassy_contact.php';
require_once $dir .'/inc/vc_addon/grassy_countdown.php';
require_once $dir .'/inc/vc_addon/grassy_heading.php';
require_once $dir .'/inc/vc_addon/grassy_title.php';
require_once $dir .'/inc/vc_addon/grassy_portfolio.php';
require_once $dir .'/inc/vc_addon/grassy_services.php';
require_once $dir .'/inc/vc_addon/grassy_team.php';
require_once $dir .'/inc/vc_addon/grassy_blog.php';
?>