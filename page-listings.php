<?php get_header() ?>

<div class="section mid-cont center above-footer border">

	<div class="categories">
		<?php while( have_rows('categories_for_listings_page') ): the_row(); 
		$name = get_sub_field('name');
		$idx_number = get_sub_field('idx_link');
		$image = get_sub_field("background_image") ?>
			<a style="background-image:url( <?php echo $image ?> )" href="<?php echo $idx_number ?>"><span><?php echo $name ?></span></a>
		<?php endwhile; ?>
	</div>
</div>



<?php get_footer() ?>