<?php
/**
 * Template Name: Template - Default page
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header();the_post(); ?>
<div class="page mid-cont">
	<h2 class="title"><?php the_title() ?></h2>
	<div class="content">
		<?php the_content(); ?>
	</div>
</div>
<?php get_footer(); ?>
