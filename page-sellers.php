<?php get_header(); the_post(); ?>

<div class="seller-slider mid-cont" style="background-image:url(<?php the_field('background_for_slider') ?>)">
	<?php while( have_rows('seller_points') ): the_row(); 
	$title = get_sub_field('title');
	$description = get_sub_field('description'); ?>
		<div>
			<div class="skinny-cont center">
				<h3><?php echo $title ?></h3>
				<p><?php echo $description ?></p>
			</div>
		</div>
	<?php endwhile; ?>
</div>

<div class="section center skinny-cont">
	<?php the_field('section_1') ?>
</div>

<div class="section center mid-cont gray above-footer">
	<div class="skinny-cont">
		<?php the_field('section_2') ?>
	</div>
</div>

<?php get_footer() ?>