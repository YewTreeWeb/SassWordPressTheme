<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h2>' ); ?>
		<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
	</header>

		<?php if( has_post_thumbnail() ): ?>

				<div class="thumbnail"><?php the_post_thumbnail(); ?></div>
				<?php the_excerpt(); ?>

		<?php else: ?>

				<?php the_excerpt(); ?>

		<?php endif; ?>

</article>
