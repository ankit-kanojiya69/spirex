<?php
/*
 * Plugin Name:		addlinktofooter
 * Description:		This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:			1.0
 * Author:			ankit
 * Author URI:		https://example.com/
 * License:			GPL-2.0+
 * License URI:		
 */

// Load the CSS
function dl_enqueue_assets() {
    wp_enqueue_style('addlink-styles', plugin_dir_url( __FILE__ ). 'assets/style.css');
    wp_enqueue_script( 'addlink-scripts', plugin_dir_url( __FILE__ ) . 'assets/scripts.js', array('jquery') );
}
add_action ("wp_enqueue_scripts", "dl_enqueue_assets");

 //call to action fixed button

 function dl_fixed_button() {
    ?>
    <a href="#" class="dl_fixed_button">Click Me!</a>
    <?php
}
add_action ("wp_footer", "dl_fixed_button");