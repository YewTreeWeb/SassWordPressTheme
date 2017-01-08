<?php

/*

@package yewtree theme

========================
  ENQUEUE SCRIPTS
========================

*/

/*-----------------------------------------------------------------------------
Async Scripts Load
-----------------------------------------------------------------------------*/

function web_async_scripts($url)
{
  if ( strpos( $url, '#asyncload') === false )
  return $url;
  else if ( is_admin() )
  return str_replace( '#asyncload', '', $url );
  else
  return str_replace( '#asyncload', '', $url )."' async='async";
}
add_filter( 'clean_url', 'web_async_scripts', 11, 1 );

// Add #asyncload to the end of the JavaScript file's directory e.g. .js#asyncload

/*-----------------------------------------------------------------------------
Admin Scripts
-----------------------------------------------------------------------------*/

function web_admin_scripts( $hook ){

  if( 'toplevel_page_yewtree_web' != $hook ){
    return;
  }

  wp_register_style( 'admin-styles', get_template_directory_uri() . '/css/admin.css', array(), 'all' );
  wp_enqueue_style( 'admin-styles' );

  wp_enqueue_media();

  wp_register_script( 'admin-script', get_template_directory_uri() . '/js/admin-js/admin.js', array('jQuery'), '1', true );
  wp_enqueue_script( 'admin-script' );

}
add_action( 'admin_enqueue_scripts', 'web_admin_scripts' );

/*-----------------------------------------------------------------------------
Frontend Scripts
-----------------------------------------------------------------------------*/

//true = file appears in footer
//false = file appears in Header

function web_scripts(){

  //CSS Styles

  wp_enqueue_style( 'main', get_stylesheet_uri() );

  wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), 'all' );
  wp_register_style( 'hover', get_template_directory_uri() . '/css/hover-min.css', array(), 'all' );

  wp_enqueue_style( 'animate' );
  wp_enqueue_style( 'hover' );

  //JavaScript Files

  wp_enqueue_script( 'selectivizr', get_template_directory_uri() . '/js/selectivizr-min.js', array(), '1.0.2', false);
	wp_script_add_data( 'selectivizr', 'conditional', 'lte IE 9' );

  wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/bower_components/html5shiv/dist/html5shiv.min.js', array(), '3.7.3', false);
	wp_script_add_data( 'html5shiv', 'conditional', 'lte IE 9' );

  wp_enqueue_script( 'respond', get_template_directory_uri() . '/bower_components/respond/dest/respond.min.js', array(), '1.4.2', false);
	wp_script_add_data( 'respond', 'conditional', 'lte IE 9' );

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', '', '2.2.4', true);
  wp_enqueue_script('jquery');

  wp_deregister_script('jquery-migrate');
  wp_register_script('jquery-migrate', get_template_directory_uri() . '/bower_components/jquery-migrate/jquery-migrate.min.js', '', '1.4.0', true);
  wp_enqueue_script('jquery-migrate');

  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.4', true);

  wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.min.js', array('jquery'), '1.0', true);

  wp_enqueue_script( 'rem', get_template_directory_uri() . '/bower_components/REM-unit-polyfill/js/rem.min.js', array(), '1.0', true);
	wp_script_add_data( 'rem', 'conditional', 'lte IE 9' );

}
add_action( 'wp_enqueue_scripts', 'web_scripts' );
