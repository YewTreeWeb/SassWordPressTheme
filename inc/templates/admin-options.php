<h1>Theme Settings</h1>
<?php settings_errors(); ?>
<?php

?>

<div class="admin-container">



</div>

<form id="submitSettings" class="options-form" method="post" action="options.php">
  <?php settings_fields( 'yewtree-theme-support' ); ?>
  <?php do_settings_sections( 'yewtree_web_theme' ); ?>
  <?php submit_button(); ?>
</form>
