<?php

/*

@package yewtree theme

========================
  THEME SUPPORT
========================

*/

/*-----------------------------------------------------------------------------
Custom Backgrounds
-----------------------------------------------------------------------------*/

add_theme_support('custom-background');

$defaults = array(
  'default-color'          => 'ffffff',
  'default-image'          => '',
  'wp-head-callback'       => '_custom_background_cb',
  'admin-head-callback'    => '',
  'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );

/*-----------------------------------------------------------------------------
Custom Headers
-----------------------------------------------------------------------------*/

add_theme_support('custom-header');

$defaults = array(
  'default-image'          => '',
  'random-default'         => false,
  'width'                  => 0,
  'height'                 => 0,
  'flex-height'            => false,
  'flex-width'             => false,
  'default-text-color'     => '',
  'header-text'            => true,
  'uploads'                => true,
  'wp-head-callback'       => '',
  'admin-head-callback'    => '',
  'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

/*-----------------------------------------------------------------------------
HTML5 Markup for Search Forms
-----------------------------------------------------------------------------*/

add_theme_support('html5', array('search-form'));

/*-----------------------------------------------------------------------------
Post Thumbnails
-----------------------------------------------------------------------------*/

add_theme_support('post-thumbnails');

// example of custom thumbnail
/*
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
add_theme_support( 'post-thumbnails' );

add_image_size( 'postslider', 251, 241, true ); // Permalink thumbnail size

}
*/

/*-----------------------------------------------------------------------------
Post Formats
-----------------------------------------------------------------------------*/

$options = get_option( 'post_formats' );

$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
  $output[] = ( @$options[$format] == 1 ? $format : '' );
}

if( !empty( $options ) ){
  add_theme_support( 'post-formats', $output );
}
