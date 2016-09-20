<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<div class="container" id="search-content">
    <section class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <!--shows the search word-->
                <?php if (have_posts()) : ?>
                <h1>Your search results for <?php echo $s ?></h1>
                
                <!--shows search result e.g. link, excerpt-->
                <?php while (have_posts()) : the_post(); ?>
                <div class="results" id="post-<?php the_ID(); ?>">
                   <!-- shows name of result and make it a link -->
                   <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                   <!-- shows result's image and make it a link to result -->
                    <?php  if(get_the_post_thumbnail($post->ID, true) != ""){ ?>
				    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID); ?></a>
                    <?php  } else { ?>			
				        <div class="hidden"></div>	
				    <?php  }?>
                   <!-- shows the excerpt of each result -->
                   <?php if ( function_exists('the_excerpt') && is_search() ) {
				        the_excerpt();
				    } ?>
               
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                    <h1>No results found. Perhaps try a different search?</h1>
                    <div class="search"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
			    <?php endif; ?>	
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

