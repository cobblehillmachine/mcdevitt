<?php get_header();the_post(); ?>
<div class="section border mid-cont mls mls-results">
	<div class="gray section">
		<div class="slider"></div>
		<div class="table">
			<div class="table-cell sidebar">
				<h3>Refine Results</h3>
				<?php dynamic_sidebar('featured-sidebar'); ?>
			</div>
			<div class="table-cell results">
			<?php $featured_listings = new WP_query(array('post_type' => 'featuredlistings')) ?>
			<?php while ( $featured_listings->have_posts() ) : $featured_listings->the_post();?>
				<?php the_title() ?>             
			<?php endwhile; ?> 
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>