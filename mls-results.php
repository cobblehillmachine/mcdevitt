<?php
/**
 * Template Name: Template - MLS Results
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header();the_post(); ?>
<div class="section border mid-cont mls mls-results">
	<div class="gray section">
		<div class="table">
			<div class="table-cell sidebar">
				<h3>Refine Results</h3>
				<?php dynamic_sidebar('mls-sidebar'); ?>
			</div>
			<div class="table-cell results">
				<div class="left">
					<h2>Real Estate Matching Your Results</h2>
					<h3>IDX Search Results</h3>
				</div>
				<?php the_content() ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>