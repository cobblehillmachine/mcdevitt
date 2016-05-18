<?php get_header() ?>

<div class="section mid-cont center above-footer border">
	<div>
		<a href="/featured-listings" class="button">Featured Listings</a>
		<a href="/mls-listings" class="button">MLS Listings</a>
	</div>
	<div class="categories">
		<?php while( have_rows('categories_for_listings_page') ): the_row(); 
		$name = get_sub_field('name');
		$idx_number = get_sub_field('idx_number');
		$image = get_sub_field("background_image") ?>
			<li style="background-image:url( <?php echo $image ?> )"><a href="/idx/?idx-q-PropertyTypes=<?php echo $idx_number ?>"><?php echo $name ?></a></li>
		<?php endwhile; ?>
	</div>
</div>



<?php get_footer() ?>