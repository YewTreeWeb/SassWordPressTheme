<?php
/**
* Category Template
*/

get_header(); ?>

<div id="catergory" class="container-fluid">
	<div class="container" role="main">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<?php
				// Check if there are any posts to display
				if ( have_posts() ) : ?>

				<?php

				// The Loop
				while ( have_posts() ) : the_post(); ?>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> by <?php echo the_field('written_by') ?></small>

				<div class="entry">
					<?php the_content(); ?>

					<p class="postmetadata"><?php
					comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
					?></p>
				</div>

				<?php endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>

				<?php endif; ?>
			</div>
			<div class="col-sm-4 col-xs-12">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
