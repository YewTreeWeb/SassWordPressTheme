<?php
/*
Template Name: index
*/
?>

<?php get_header(); ?>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>

			<?php endwhile; ?>

			<div class="col-xs-6 text-left">
				<?php next_posts_link('Older Posts');?>
			</div>
			<div class="col-xs-6 text-right">
				<?php previous_posts_link('Newer Posts'); ?>
			</div>

			<?php else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
