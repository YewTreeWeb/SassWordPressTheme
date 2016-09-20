<?php
/*
Template Name: all posts
*/
?>
<?php get_header(); ?>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xs-12">
				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php if(has_post_thumbnail()): ?>
					<div class="thumbnail"><?php echo get_the_post_thumbnail($post->ID); ?></div>
				<?php endif; ?>

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<p><em><?php the_time('l, F jS, Y'); ?></em></p>

				<?php the_excerpt(); ?>

				<hr>

				<?php endwhile; ?>

				<div class="col-xs-6 text-left">
					<?php next_posts_link('Older Posts');?>
				</div>
				<div class="col-xs-6 text-right">
					<?php previous_posts_link('Newer Posts'); ?>
				</div>

				<?php else: ?>
				  <p><?php _e('Sorry, there are no posts.'); ?></p>
				<?php endif; ?>
			</div>

			<div class="col-md-4 col-xs-12">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
</div>
<?php get_footer(); ?>
