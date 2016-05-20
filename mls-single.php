<?php
/**
 * Template Name: Template - MLS Single
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header();the_post(); ?>
<div class="section border mid-cont mls mls-results">
	<div class="gray section">
		<h2><?php the_title() ?></h2>
		<?php the_post_thumbnail() ?>
		<?php the_content() ?>
	</div>
</div>
<?php get_footer() ?>