<?php get_header(); ?>

<div class="mid-cont homepage-hero search center" style="background-image:url(<?php the_field('background_hero_image') ?>)">
	<h1><?php the_field('search_headline'); ?></h1>
	<?php // dynamic_sidebar('homepage-hero'); ?>
	<a target="_blank" href="https://idxpro.cisdata.net/AR213674/Search/advanced/">Search Our MLS</a>
</div>
<div class="mid-cont table mobile-mid-cont section homepage-content">
	<div class="table-cell"><?php the_field('content'); ?></div>
	<div class="table-cell"><div class="learn-more-cta"><?php the_field('learn_more_cta'); ?></div></div>
</div>
<div class="mid-cont homepage-menu-wrapper" style="background-image:url(<?php the_field('background_image_of_homepage_menu') ?>)">
	<div class="homepage-menu">
		<h3>What can we help you with?</h3>
		<?php while( have_rows('homepage_menu') ): the_row(); 
			$text = get_sub_field('link_text');
			$link = get_sub_field('link_to'); ?>
	
			<li>
				<a href="<?php echo $link ?>"><?php echo $text ?></a>
			</li>

		<?php endwhile; ?>
	</div>
</div>
	
<?php get_footer(); ?>