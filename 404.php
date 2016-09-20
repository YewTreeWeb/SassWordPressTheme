<?php get_header(); ?>

<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <section>
          <header class="page-header">
            <h1 class="error">404, Sorry the page could not be found</h1>
          </header>

          <div class="page-content">
            <p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>

            <?php get_search_form(); ?>

            <hr>

            <?php the_widget('WP_Widget_Recent_Posts'); ?>

            <hr>

            <div class="widget widget_categories">
              <h3>Check the most used categories</h3>
              <ul>
                <?php
                wp_list_categories( array(
                  'orderby' => 'count',
                  'order' => 'DESC',
                  'show_count' => 1,
                  'title_li' => '',
                  'number' => 5,
                ) );
                ?>
              </ul>
            </div>

            <hr>

            <?php the_widget('WP_Widget_Archives', 'dropdown=0', "after_title=</h2>$archive_content"); ?>

          </div>

        </section>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
