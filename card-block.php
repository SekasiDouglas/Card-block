<?php
/**
 * Plugin name: Card Block 
 * Plugin URI: https://www.github.com/SekasiDouglas/travel-block
 * Description: Card Block
 * Author: Sekasi Douglas
 * Author URI: https://www.github.com/SekasiDouglas
 * version: 0.1.0
 * License: GPL2 or later.
 * text-domain: Card Block
 */

 defined( 'ABSPATH' ) or die( 'No Authorized Access' );

 add_action('acf/init', 'my_acf_init_card_block');
function my_acf_init_card_block() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'cardblock',
            'title'             => __('Card Block'),
            'description'       => __(' Card Block to add some information'),
            'render_template'   => plugin_dir_path( __FILE__ ) .'template-parts/card-block.php',
            'category'          => 'media',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'Card', 'Block' ),
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'card-block', plugin_dir_url(__FILE__).'assets/css/style.css','','1.0.0','all');            }
        ));
    }
}