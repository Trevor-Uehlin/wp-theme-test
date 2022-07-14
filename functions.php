<?php 

##############################################################################################################################
###################################  ADDING CUSTOM CSS AND JS FILES  #########################################################
##############################################################################################################################
            
if(!function_exists('fbf_add_styles')) {            
    add_action('wp_enqueue_scripts', 'fbf_add_styles');
    
    function fbf_add_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    }
}


function fbf_add_scripts() {
    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/fbf.js', array(), null );
    wp_enqueue_script("custom-js");
}
add_action( 'wp_enqueue_scripts', 'fbf_add_scripts' );




##############################################################################################################################
################################### SETTING DEFAULT EXCERPT LENGTH  ##########################################################
##############################################################################################################################

// Over riding the default excerpt length for posts.
function fbf_excerpt_length($length) {
    
	return 150; // # of words, default is 55.
}
add_filter('excerpt_length', 'fbf_excerpt_length');
