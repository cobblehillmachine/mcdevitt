<?php get_header(); the_post();
$town_id = get_the_ID(); ?>

<div class="mid-cont town">
	<img src="<?php the_field('hero_image') ?>" class="hero">
	<img src="<?php the_field('badge') ?>" class="badge">
</div>

<div class="section gray center mid-cont">
	<div class="skinny-cont">
		<h3 style="color: <?php the_field('color') ?>; letter-spacing: 2px;"><?php the_title() ?></h3>
		<?php the_field('about_copy') ?>
	</div>
</div>

<div class="section mid-cont table center navy-ctas">
	<a class="table-cell smooth-scroll" href="#explore-the-neighborhoods">Explore the Neighborhoods</a>
	<a class="table-cell" href="#">View the Video</a>
	<a class="table-cell" href="/mls-listings">Search All Homes For Sale</a>

</div>

<div class="section gray center mid-cont" id="explore-the-neighborhoods">
	<div class="filter-box">
		<h3>Explore the Neighborhoods</h3>
		<div class="neighborhood-list">
			<?php $neighborhoods = new WP_query(array('post_type' => 'Neighborhoods', 'meta_key' => 'town', 'meta_value' => $town_id, 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => -1)) ?>
			<?php while ( $neighborhoods->have_posts() ) : $neighborhoods->the_post();?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</li>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<div class="section above-footer center mid-cont">
	<h3>Featured Listings</h3>
	<div class="listings-slider">
		<?php $listings = new WP_query(array('post_type' => 'Featured Listings', 'meta_key' => 'town', 'meta_value' => $town_id, 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => -1)) ?>
		<?php while ( $listings->have_posts() ) : $listings->the_post();?>
			<a href="<?php the_permalink() ?>">
				<span><?php the_field('listing_price'); ?></span>
				<?php the_post_thumbnail() ?>
				<h4 style="background-color: <?php the_field('color', $town_id) ?>;"><?php the_title() ?></h4>
			</a>
		<?php endwhile; ?>
	</div>
</div>


<?php get_footer() ?>