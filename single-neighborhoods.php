<?php get_header();
$neighborhood_id = get_the_ID();
$town = get_field('town');
$post = $town;
setup_postdata( $post );
	$color = get_field('color');
	$town_name = get_the_title();
	$abbreviation = get_field('abbreviation');
	$badge_img_src = get_field('badge');
wp_reset_postdata();

$post = get_field('you_might_also_like');
setup_postdata( $post );
	$suggested_name = get_the_title();
	$suggested_link = get_the_permalink();
wp_reset_postdata();

the_post();?>

<div class="mid-cont center neighborhood-hero" style="background-color: <?php echo $color ?>">
	<div class="other-neighborhoods">
		<div class="neighborhood-toggle close">
			<span>close <?php echo $abbreviation ?> neighborhoods</span>
		</div>
		<?php $neighborhoods = new WP_query(array('post_type' => 'Neighborhoods', 'meta_key' => 'town', 'meta_value' => $town_id, 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => -1)) ?>
			<?php while ( $neighborhoods->have_posts() ) : $neighborhoods->the_post();?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</li>
			<?php endwhile; wp_reset_query(); ?>
	</div>
	<div class="open neighborhood-toggle">
		<span>show all <?php echo $abbreviation ?> neighborhoods</span>
	</div>
	<h3><?php echo $town_name ?></h3>
	<h1><?php the_title(); ?></h1>
</div>


<div class="section mid-cont center">
	<div class="table mid-cont navy-ctas">
		<a class="table-cell smooth-scroll" href="#details-and-stats">Neighborhood Details & Stats</a>
		<a class="table-cell" href="#">View the Video</a>
		<a class="table-cell" href="/mls-listings">Search All Homes For Sale</a>
	</div>
	<div class="skinny-cont center section">
		<?php the_content() ?>
		<p><a class="button" href="#">View Homes for Sale </a></p>
	</div>
</div>



<div class="gray section mid-cont table what-are-the-homes-like">
	<div class="table-cell half relative">
		<?php the_post_thumbnail() ?>
		<img class="badge askew" src="<?php echo $badge_img_src ?>">
	</div>
	<div class="table-cell half">
		<h3>What are the homes like?</h3>
		<?php the_field('what_are_the_homes_like') ?>
	</div>
</div>


<div class="section">
	<div class="gray section mid-cont center" id="details-and-stats">
		<table>
			<thead>
				<tr>
					<th>AVG. SALE PRICE</th>
					<th>AVG. SALE RANGE</th>
					<th>BEST KNOWN FOR</th>
					<th>TYPICAL HOME SIZE</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<li><?php the_field('average_sale_price') ?></li>
					</td>
					<td>
						<li><?php the_field('average_sale_range') ?></li>
					</td>
					<td>
						<?php while( have_rows('best_known_for') ): the_row(); ?>
							<li><?php the_sub_field('point') ?></li>
						<?php endwhile; ?>
					</td>
					<td>
						<li><?php the_field('typical_bedrooms') ?></li>
						<li><?php the_field('typical_square_footage') ?></li>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class=" mid-cont why_this_neighborhood">
	<div class="table">
		<div class="table-cell half">
			<h3>Why <?php the_title() ?>?</h3>
			<?php the_field('why_this_neighborhood') ?>
		</div>
		<div class="table-cell gray half">
			<h3><?php the_title() ?> might be your neighborhood if:</h3>
			<?php the_field('might_be_your_neighborhood_if') ?>
		</div>
	</div>
</div>

<div class="section mid-cont geography">
	<div id="map-canvas-neighborhood" class="table-cell" data-long="<?php the_field('longitude') ?>" data-lat="<?php the_field('latitude') ?>"></div>
	<div class="table-cell">
		<h3>Geography</h3>
		<?php the_field('geography_info') ?>
	</div>
</div>

<div class="section gray center mid-cont">
	<h3>Featured Listings</h3>
	<div class="listings-slider">
		<?php $listings = new WP_query(array('post_type' => 'Featured Listings', 'meta_key' => 'neighborhood', 'meta_value' => $neighborhood_id, 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => -1)) ?>
		<?php while ( $listings->have_posts() ) : $listings->the_post();?>
			<a href="<?php the_permalink() ?>">
				<span><?php the_field('listing_price'); ?></span>
				<?php the_post_thumbnail() ?>
				<h4 style="background-color: <?php echo $color ?>;"><?php the_title() ?></h4>
			</a>
		<?php endwhile; ?>
	</div>
</div>

<div class="section center mid-cont ctas above-footer">
	<div class="table">
		<a class="table-cell">
			<h3>Learn About</h3>
			<p><?php echo $town_name ?></p>
		</a>
		<a class="table-cell">
			<h3>You Might Also Like</h3>
			<p><?php echo $suggested_name ?></p>
		</a>
		<a class="table-cell">
			<h3>take me to</h3>
			<p>MLS Search</p>
		</a>


	 </div>
</div>



<?php get_footer() ?>