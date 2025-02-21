<?php
function woo3d_admin_assets(){
    wp_enqueue_script('modelviewer' , woo3dproduct_url.'assets/js/model-viewer.js',[],'13.11');

    wp_enqueue_script('model' , woo3dproduct_url.'assets/js/model.js',['jquery'],null,true);
    wp_enqueue_style('woo3dstyle', woo3dproduct_url.'assets/style/style.css',[],1.1,'all');
   
}


add_action('wp_enqueue_scripts', 'woo3d_admin_assets',9999);
add_action('admin_enqueue_scripts', 'woo3d_admin_assets',9999);


