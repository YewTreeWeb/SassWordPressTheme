<?php get_header(); ?>

<div class="container-fluid">
	<div class="container">
		<div class="row">

			<div class="col-sm-8 col-xs-12 ">

				<?php if( have_posts() ): ?>

					<header class="page-header">
						<?php

							the_archive_title('<h1 class="page-title">', '</h1>');
							the_archive_description('<div class="taxonomy-description">', '</div>');

						?>
					</header>

					<?php while( have_posts() ): the_post(); ?>

						<?php get_template_part('archive', 'content'); ?>

					<?php endwhile; ?>

					<div class="col-xs-12">
						<?php the_posts_navigation(); ?>
						<div class="col-xs-6 text-left">
							<?php next_posts_link('Older Posts');?>
						</div>
						<div class="col-xs-6 text-right">
							<?php previous_posts_link('Newer Posts'); ?>
						</div>
					</div>

					<?php endif; ?>

			</div>

			<div class="col-sm-4 col-xs-12 ">
				<h2>Archives by Month:</h2>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>

				<h2>Archives by Category:</h2>
					<ul>
						 <?php wp_list_categories(); ?>
					</ul>

				<?php get_search_form(); ?>
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>
