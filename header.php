<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title>
            <?php bloginfo('name'); ?><?php wp_title('|'); ?>
        </title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
          <?php
            $header_image = get_header_image();
            if ( ! empty( $header_image ) ) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                </a>
              <?php } // if ( ! empty( $header_image ) )
            ?>
            <nav id="menu-wrapper" class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    </div>
                    <div class="collapse navbar-collapse">
                      <?php
                        if ( has_nav_menu( 'primary' ) ) {
                          wp_nav_menu( array('theme_location' => 'primary', 'menu_id' => 'primary', 'menu_class' => 'nav navbar-nav', 'container_class' => 'nav-wrap', 'fallback_cb' => 'wp_page_menu', 'walker' => new Walker_Nav() ) );
                        }
                        elseif ( has_nav_menu( 'dropdown-1' ) ) {
                          wp_nav_menu( array('theme_location' => 'dropdown-1', 'menu_id' => 'dropdown-1', 'menu_class' => 'nav navbar-nav', 'container_class' => 'nav-wrap', 'fallback_cb' => 'wp_page_menu' ) );
                        }
                        elseif ( has_nav_menu( 'dropdown-2' ) ) {
                          wp_nav_menu( array('theme_location' => 'dropdown-2', 'menu_id' => 'dropdown-2', 'menu_class' => 'nav navbar-nav', 'container_class' => 'nav-wrap', 'fallback_cb' => 'wp_page_menu' ) );
                        }
                        elseif ( has_nav_menu( 'dropdown-3' ) ) {
                          wp_nav_menu( array('theme_location' => 'dropdown-3', 'menu_id' => 'dropdown-3', 'menu_class' => 'nav navbar-nav', 'container_class' => 'nav-wrap', 'fallback_cb' => 'wp_page_menu' ) );
                        }
                        else{
                          echo '<div class="default-menu">';
                            echo '<ul>';
                              wp_list_pages( array( 'title_li' => '' ) );
                            echo '</ul>';
                          echo '</div>';
                        }
                      ?>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </header>
