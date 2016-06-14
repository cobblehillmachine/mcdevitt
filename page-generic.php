<?php
/**
 * Template Name: Template - Generic(SEO)
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header();the_post(); ?>
<div class="page-generic mid-cont border above-footer">
	<div class="content skinny-cont">
		<?php the_content(); ?>
	</div>
</div>
<?php get_footer(); ?>