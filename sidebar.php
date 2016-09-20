<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="main-sidebar" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->
	</div><!-- #main-sidebar -->
<?php else : ?>
	<div id="main-sidebar" class="sidebar-container" role="complementary">
		<aside id="pages" class="widget">
			<?php wp_list_pages('title_li=<h3>Pages</h3>'); ?>
		</aside>
		<aside id="categories" class="widget">
			<h3 class="widget-title"><?php _e('Categories:'); ?></h3>
			<div class="widget-content">
				<ul>
					<?php wp_list_cats(); ?>
				</ul>
			</div>
		</aside>
		<aside id="archives" class="widget">
			<h3 class="widget-title"><?php _e( 'Archives'); ?></h3>
			<div class="widget-content">
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</div>
		</aside>
	</div>
<?php endif; ?>
