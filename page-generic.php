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
	<div class="headlines">
		<h2><?php the_field('headline') ?></h2>
		<?php $subheadline = get_field('subheadline') ?>
		<?php if ($subheadline) { ?>
			<h3><?php echo $subheadline ?></h3>
		<?php } ?>
	</div>
	
	<div class="content skinny-cont">
		<?php the_content(); ?>
	</div>
</div>
<?php get_footer(); ?>