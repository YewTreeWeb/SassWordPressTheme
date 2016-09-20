<?php

/*

@package yewtree theme

========================
  ADMIN PAGE
========================

*/

function yewtree_add_admin_page(){

/*----------------------------------

 Create admin page

 ---------------------------------*/

  add_menu_page( 'Admin Options', 'Admin', 'manage_options', 'yewtree_web', 'yewtree_theme_create_page', 'dashicons-admin-customizer', 110);

  //Create admin sub pages

  add_submenu_page( 'yewtree_web', 'Theme Essentials', 'Essentials', 'manage_options', 'yewtree_web', 'yewtree_theme_create_page' );

  add_submenu_page( 'yewtree_web', 'Admin Options', 'Options', 'manage_options', 'yewtree_web_theme', 'yewtree_theme_support_page' );

  add_submenu_page( 'yewtree_web', 'YewTree CSS Options', 'Custom CSS', 'manage_options', 'yewtree_web_css', 'yewtree_theme_settings_page');

}
add_action( 'admin_menu', 'yewtree_add_admin_page' );

/*----------------------------------

 Custom Settings

 ---------------------------------*/

add_action( 'admin_init', 'yewtree_settings' );

/*--------------------------------
  Options
--------------------------------*/

function yewtree_settings(){

  // Theme Essentials

  register_setting( 'yewtree-settings-group', 'profile_picture' );
  register_setting( 'yewtree-settings-group', 'website_logo' );
	register_setting( 'yewtree-settings-group', 'first_name' );
	register_setting( 'yewtree-settings-group', 'last_name' );
	register_setting( 'yewtree-settings-group', 'user_description' );
	register_setting( 'yewtree-settings-group', 'twitter', 'yewtree_sanitize_twitter' );
	register_setting( 'yewtree-settings-group', 'facebook' );
	register_setting( 'yewtree-settings-group', 'googleplus' );

  add_settings_section( 'yewtree-theme-essentials', 'Theme Essentials', 'yewtree_theme_essentials', 'yewtree_web');

	add_settings_field( 'theme-profile-picture', 'Profile Picture', 'yewtree_theme_profile', 'yewtree_web', 'yewtree-theme-essentials');

  add_settings_field( 'theme-website-logo', 'Website Logo', 'yewtree_theme_logo', 'yewtree_web', 'yewtree-theme-essentials');

	add_settings_field( 'theme-name', 'Full Name', 'yewtree_theme_name', 'yewtree_web', 'yewtree-theme-essentials');

	add_settings_field( 'theme-description', 'Description', 'yewtree_theme_description', 'yewtree_web', 'yewtree-theme-essentials');

	add_settings_field( 'theme-twitter', 'Twitter', 'yewtree_theme_twitter', 'yewtree_web', 'yewtree-theme-essentials');

	add_settings_field( 'theme-facebook', 'Facebook', 'yewtree_theme_facebook', 'yewtree_web', 'yewtree-theme-essentials');

	add_settings_field( 'theme-googleplus', 'Google+', 'yewtree_theme_googleplus', 'yewtree_web', 'yewtree-theme-essentials');

  //Theme Settings

  register_setting( 'yewtree-theme-support', 'post-formats', 'yewtree_post_formats_callback' );
  register_setting( 'yewtree-theme-support', 'custom_header' );
	register_setting( 'yewtree-theme-support', 'custom_background' );

  add_settings_section( 'yewtree-theme-options', 'Theme Settings', 'yewtree_theme_theme-options', 'yewtree_web_theme');

  add_settings_field( 'post-formats', 'Post Formats', 'yewtree_post_formats', 'yewtree_web_theme', 'yewtree-theme-options' );

	add_settings_field( 'custom-header', 'Custom Header', 'yewtree_custom_header', 'yewtree_web_theme', 'yewtree-theme-options' );

	add_settings_field( 'custom-background', 'Custom Background', 'yewtree_custom_background', 'yewtree_web_theme', 'yewtree-theme-options' );

}

/*--------------------------------
  Theme Essentials Functions
--------------------------------*/

function yewtree_theme_options(){
  echo 'Add your theme information';
}

function yewtree_theme_profile(){
  $profile = esc_attr( get_option( 'profile_picture' ) );
  echo '<input type="button" value="Upload Profile Picture" id="upload-profile" class="btn btn_secondary"><input type="hidden" id="submitted-picture" name="profile_picture" value="'.$profile.'" />';
}

function yewtree_theme_name(){
  $firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function yewtree_theme_description(){
  $description = esc_attr( get_option( 'user_description' ) );
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Custom Description" /><p class="description">If there is no description the WordPress tagline will be added in theme. However if there is no tagline this field will not display.</p>';
}

function yewtree_theme_twitter(){
  $twitter = esc_attr( get_option('twitter') );
  echo '<input type="text" name="twitter_handler" value"'.$twitter.'" placeholder="Twitter handler" /><p class="description">Please enter your Twitter username without the @';
}

function yewtree_theme_facebook(){
  $facebook = esc_attr( get_option('facebook') );
  echo '<input type="text" name="facebook_handler" value"'.$facebook.'" placeholder="Facebook handler" />';
}

function yewtree_theme_googleplus(){
  $google = esc_attr( get_option('googleplus') );
  echo '<input type="text" name="googleplus_handler" value"'.$google.'" placeholder="Google+ handler" />';
}


// Twitter sanitization settings
function yewtree_sanitize_twitter( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@', '', $output);
  return $output;
}

/*--------------------------------
  Theme Settings Functions
--------------------------------*/

function yewtree_post_formats_callback( $input ){
  return $input;
}

function yewtree_theme_settings() {
	echo 'Activate or Deactivate specific Theme Support Options';
}

function yewtree_post_formats(){
  $options = get_option( 'post-formats' );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
  $output = '';
  foreach ( $formats as $format ){
    $checked = ( @$options[$format] == 1 ? 'checked' : '' );
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

/*----------------------------------

 Template functions

 ---------------------------------*/
 function yewtree_theme_create_page(){
   require_once( get_template_directory() . '/inc/templates/theme-essentials.php');
 }

function yewtree_theme_support_page(){
  require_once( get_template_directory() . '/inc/templates/admin-options.php');
}
