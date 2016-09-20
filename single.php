<?php
/*
Template Name: post page
*/
?>
<?php get_header(); ?>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xs-12">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if(has_post_thumbnail()): ?>
							<div class="thumbnail"><?php echo get_the_post_thumbnail($post->ID); ?></div>
						<?php endif; ?>

						<h1><?php the_title(); ?></h1>

						<small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>

						<?php the_content(); ?>

						<hr>

						<?php if(comments_open()){
							comments_template();
						} else {
							echo '<h6 class="text-center">Comments are currently unavailable for this post</h6>';
						} ?>

					</article>

					<hr>

					<div class="col-xs-6 text-left">
						<?php previous_post_link(); ?>
					</div>
					<div class="col-xs-6 text-right">
						<?php next_post_link(); ?>
					</div>



				<?php endwhile; else: ?>
					<p><?php _e('Sorry, this page does not exist.'); ?></p>
				<?php endif; ?>

			</div>
			<div class="col-md-4 col-xs-12">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
