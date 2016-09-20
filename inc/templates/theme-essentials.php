<h1>Theme Essentials</h1>
<?php settings_errors(); ?>
<?php

$profile = esc_attr( get_option( 'profile-picture' ) );
$firstName = esc_attr( get_option( 'first_name' ) );
$lastName = esc_attr( get_option( 'last_name' ) );
$fullName = $firstName . ' ' . $lastName;
$description = esc_attr( get_option( 'user_description' ) );
$twitter_icon = esc_attr( get_option( 'twitter' ) );
$facebook_icon = esc_attr( get_option( 'facebook' ) );
$gplus_icon = esc_attr( get_option( 'googleplus' ) );

?>


<div class="sidebar-preview">
  <div class="custom-sidebar">

    <div class="profile-container">
      <div id="profile-preview" class="profile-picture" style="background-image: url(<?php print $profile; ?>);"></div>
    </div>

    <div class="sidebar-username">
      <h1><?php print $fullName; ?></h1>
    </div>

    <div class="sidebar-description">
      <h2><?php print $description; ?></h2>
    </div>

    <div class="sidebar-social-media">
      <?php if( !empty( $twitter_icon ) ): ?>
				<span class="sunset-icon-sidebar dashicons-before dashicons-twitter"></span>
			<?php endif;
			if( !empty( $gplus_icon ) ): ?>
				<span class="sunset-icon-sidebar sunset-icon-sidebar--gplus dashicons-before dashicons-googleplus"></span>
			<?php endif;
			if( !empty( $facebook_icon ) ): ?>
				<span class="sunset-icon-sidebar dashicons-before dashicons-facebook-alt"></span>
			<?php endif; ?>
    </div>

  </div>
</div>


<form id="submitSettings" class="options-form" method="post" action="options.php">
  <?php settings_fields( 'yewtree-settings-group' ); ?>
  <?php do_settings_sections( 'yewtree_web' ); ?>
  <?php submit_button(); ?>
</form>
