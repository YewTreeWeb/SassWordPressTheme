<?php get_header(); ?>

<div class="container-fluid"><!-- start fluid container -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>

        <?php endwhile; ?>

          <?php else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
</div>

<?php get_footer(); ?>
