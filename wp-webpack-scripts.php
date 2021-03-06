<?php

// NOTE: In order for Webpack dev server to use dev assets opposed to the compiled assets, add the following to your wp-config.php
// define( 'WP_CONTENT_URL', '/wp-content');

function load_scripts_init() {
    $dist = get_stylesheet_directory_uri() . '/dist/';

    // Use this if you have assets that need to be outside of the webpack bundle
    // $distStatic = get_stylesheet_directory_uri() . '/dist-static/';

    // Use these if you need a different version of jquery than what comes with WordPress
    // wp_deregister_script('jquery');
    // wp_register_script('jquery', ('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'), false, false, false);
    // wp_enqueue_script('jquery');  

    // Use this if you have assets that need to be outside of the webpack bundle
    // wp_register_script('asset-fuke.js', $distStatic . 'asset-file.js', 'jquery', '1.0', true);
    // wp_enqueue_script('asset-fuke.js');
    
    wp_register_script('main.js', $dist . 'main.js', array(), false, false);
    wp_register_style('style.css', $dist . 'style.css');

    wp_enqueue_script('main.js');
    wp_enqueue_style('style.css');
}  

if ( !is_admin() ) {
   add_action('wp_enqueue_scripts', 'load_scripts_init');
}

?>