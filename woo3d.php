<?php
/*
 * Plugin Name:       تصویر سه بعدی محصول
 * Plugin URI:        https://doorkalla.ir/
 * Description:       افزودن تصویر سه بعدی به محصول در ووکامرس
 * Version:           0.8.6
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            majid zohorian
 * Author URI:        majidz.ir
 * License:           GPL v2 or later
 * License URI:       
 * Update URI:        
 * Text Domain:       woo3d-product
 */



if (!defined('ABSPATH')) {
    exit;
}


define('woo3dproduct_path', plugin_dir_path(__FILE__));
define('woo3dproduct_url', plugin_dir_url(__FILE__));
define('woo3dproduct_inc', woo3dproduct_path . '/inc/');

require_once woo3dproduct_inc . '/enqueue-scripts.php';

require_once woo3dproduct_inc . '/admin/shortcode.php';

function add_button_show3d()
{
    if (is_product()) {
        $image3d = get_post_meta(get_the_ID(), '_image3d_product_image', true);

        if(! empty($image3d)){
            require_once woo3dproduct_inc . '/user/show3d.php';
        }
    }

}


add_action('woocommerce_before_single_product_summary', 'add_button_show3d');



if (is_admin()) {

    require_once woo3dproduct_inc . '/admin/metabox.php';
}
