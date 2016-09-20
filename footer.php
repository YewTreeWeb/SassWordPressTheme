<footer class="container-fluid"><!-- start fluid container -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
              <?php
                if ( has_nav_menu( 'footer' ) ) {
                wp_nav_menu( array('theme_location' => 'footer', 'menu_class' => 'footer-menu', 'container_class' => 'footer-menu-wrap', 'fallback_cb' => 'wp_page_menu' ) );
                }
                else{
                  echo '<div class="default-menu">';
                    echo '<ul>';
                      wp_list_pages( array( 'title_li' => '' ) );
                    echo '</ul>';
                  echo '</div>';
                }
                ?>
                <p>Copyright &copy; <?php echo date('Y'); ?> by <?php echo get_bloginfo('name'); ?>. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer><!-- end fluid container -->

<?php wp_footer(); ?>
</body>
</html>
