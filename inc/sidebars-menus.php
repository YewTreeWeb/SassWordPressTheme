<?php

/*

@package yewtree theme

========================
  SIDEBARS AND MENUS
========================

*/

/*-----------------------------------------------------------------------------
Sidebar
-----------------------------------------------------------------------------*/

function sidebar_setup() {

  register_sidebar(array(
      'name'          => 'Sidebar',
      'id'            => 'sidebar-1',
      'class'         => 'sidebar',
      'description'   => 'Default Sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(array(
      'name'          => 'Sidebar 2',
      'id'            => 'sidebar-2',
      'class'         => 'second-sidebar',
      'description'   => 'Secondary Sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

}
add_action('widgets_init', 'sidebar_setup');


/*-----------------------------------------------------------------------------
Menus
-----------------------------------------------------------------------------*/
function register_menus() {

  add_theme_support('menus');

  register_nav_menus(
  array(
    'primary' => __( 'Primary Menu'),
    'dropdown-1' => __( 'Dropdown Menu 1'),
    'dropdown-2' => __( 'Dropdown Menu 2'),
    'dropdown-3' => __( 'Dropdown Menu 3'),
    'secondary-menu' => __( 'Secondary Menu'),
    'footer' => __( 'Footer Menu'), // you can repeat this as many times as you wish.
    )
  );

}
add_action('init', 'register_menus');
