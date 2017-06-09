<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION
wp_enqueue_style( 'parsley', get_template_directory_uri() . '/css/parsley.css',false,'1.1','all');



function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
     wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/parsley.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function fit_child_scripts() {
    wp_enqueue_script('test js', get_stylesheet_directory_uri() . '/js/test.js');

}
add_action( 'wp_enqueue_scripts', 'fit_child_scripts' );
function some_script_enqueue(){
    wp_enqueue_style('customsyle', get_template_directory_uri() . '/css/parsley.css', array(), '1.0.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'some_script_enqueue' );


function my_function() {
  return "Hello world!";
}