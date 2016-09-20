<?php

/*-----------------------------------------------------------------------------
Head Function - remove WordPress version
-----------------------------------------------------------------------------*/

function theme_remove_version() {
  return '';
}
add_filter('the_generator', 'theme_remove_version');

/*-----------------------------------------------------------------------------
Enqueue Scripts
-----------------------------------------------------------------------------*/

require get_template_directory() . '/inc/enqueue.php';

/*-----------------------------------------------------------------------------
Admin Page
-----------------------------------------------------------------------------*/

require get_template_directory() . '/inc/admin-page.php';

/*-----------------------------------------------------------------------------
Sidebars and Menus
-----------------------------------------------------------------------------*/

require get_template_directory() . '/inc/sidebars-menus.php';

/*-----------------------------------------------------------------------------
Include Bootstrap Walker
-----------------------------------------------------------------------------*/

require get_template_directory() . '/inc/walker.php';

/*-----------------------------------------------------------------------------
Theme Support
-----------------------------------------------------------------------------*/

require get_template_directory() . '/inc/theme-support.php';

/*-----------------------------------------------------------------------------
Page Excerpts
-----------------------------------------------------------------------------*/

function get_excerpt(){
  $excerpt = get_the_content();
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, 10);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
  return $excerpt;
}
add_action( 'init', 'excerpts_to_pages' );

function excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}

/*-----------------------------------------------------------------------------
Scheduled Events
-----------------------------------------------------------------------------*/

// Change the "Scheduled for" text on Event post types changing the translation
function translation_mangler($translation, $text, $domain) {
  global $post;
  if ($post->post_type == 'event' || 'externalevent') {

    $translations = &get_translations_for_domain( $domain);
    if ( $text == 'Scheduled for: <b>%1$s</b>') {
      return $translations->translate( 'Event End Date: <b>%1$s</b>' );
    }
    if ( $text == 'Published on: <b>%1$s</b>') {
      return $translations->translate( 'Event End Date: <b>%1$s</b>' );
    }
    if ( $text == 'Publish <b>immediately</b>') {
      return $translations->translate( 'Event End Date: <b>%1$s</b>' );
    }
  }

  return $translation;
}

add_filter('gettext', 'translation_mangler', 10, 4);


// Show Scheduled Posts

function show_scheduled_posts($posts) {
  global $wp_query, $wpdb;
  if(is_single() && $wp_query->post_count == 0) {
    $posts = $wpdb->get_results($wp_query->request);
  }
  return $posts;
}

add_filter('the_posts', 'show_scheduled_posts');

/*-----------------------------------------------------------------------------
Search by Catergory
-----------------------------------------------------------------------------*/
function getCatSearchFilter($pre,$post){
  $category = "";
  $catId = htmlspecialchars($_GET["cat"]);

  if ($catId != null && $catId != '' && $catId != '0'){
    $category = $pre.get_cat_name($catId).$post;
  }

  return $category;

}

/*-----------------------------------------------------------------------------
Custom Term Function
-----------------------------------------------------------------------------*/

function awesome_get_terms( $postID, $term ){

  $terms_list = wp_get_post_terms($postID, $term);
  $output = '';

  $i = 0;
  foreach( $terms_list as $term ){ $i++;
    if( $i > 1 ){ $output .= ', '; }
    $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
  }

  return $output;

}
