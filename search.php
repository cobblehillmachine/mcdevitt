<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="skinny-cont section above-footer">
	<h1 class="title"><?php printf( __( 'Search Results for: <span>%s</span>', 'twentyfifteen' ), get_search_query() ); ?></h1>
	<div class="search-results-list">
		<!-- <div class="search-result Product" style="display: none"></div> -->
		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				<a class="search-result" href="<?php the_permalink() ?>">
					<h2><?php the_title() ?></h2>
					<?php the_excerpt() ?>
				</a>
				
			<?php endwhile;

		else :
			get_template_part( 'content', 'none' );
		endif; ?>
	</div>
</div>


<?php get_footer(); ?>
