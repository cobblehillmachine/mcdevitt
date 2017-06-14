<?php get_header();
$neighborhood_id = get_the_ID();
$town = get_field('town');
$neighb_lat = get_field('latitude');
$neighb_long = get_field('longitude');
$video_iframe = get_field('video_iframe');
$post = $town;

setup_postdata( $post );
	$color = get_field('color');
	$town_id = get_the_ID();
	$town_name = get_the_title();
	$town_url = get_the_permalink();
	$abbreviation = get_field('abbreviation');
	$badge_img_src = get_field('badge');
	$town_lat = get_field('latitude');
	$town_long = get_field('longitude');
	$town_geography = get_field('geography');
	$town_video_iframe = get_field('video_iframe');
wp_reset_postdata();

$post = get_field('you_might_also_like');
setup_postdata( $post );
	$suggested_name = get_the_title();
	$suggested_link = get_the_permalink();
wp_reset_postdata();

$neighb_geography = get_field('geography');
if ($neighb_geography) {
	$geography = $neighb_geography;
} else if ($town_geography) {
	$geography = $town_geography;
} 

the_post();?>

<div class="mid-cont center neighborhood-hero" style="background-color: <?php echo $color ?>">
	<div class="other-neighborhoods">
		<div class="neighborhood-toggle close">
			<span>close <?php echo $abbreviation ?> neighborhoods</span>
		</div>
		<ul>
		<?php $neighborhoods = new WP_query(array('post_type' => 'Neighborhoods', 'meta_key' => 'town', 'meta_value' => $town_id, 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => -1)) ?>
			<?php while ( $neighborhoods->have_posts() ) : $neighborhoods->the_post();?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
	</div>
	<div class="open neighborhood-toggle">
		<span>show all <?php echo $abbreviation ?> neighborhoods</span>
	</div>
	<h3><?php echo $town_name ?></h3>
	<h1><?php the_title(); ?></h1>
</div>


<div class="section mid-cont center main-neighb-content">
	<div class="table mid-cont navy-ctas">
		<a class="table-cell smooth-scroll" href="#details-and-stats"><?php the_title() ?> Details & Stats</a>
		<?php if ($video_iframe) { ?>
			<a class="table-cell" data-lity href='<?php echo $video_iframe ?>'>View the <?php the_title() ?> Video</a>
		<?php } else if ($town_video_iframe) { ?>
			<a class="table-cell" data-lity href='<?php echo $town_video_iframe ?>'>View the <?php the_title() ?> Video</a>
		<?php } ?>
		<a class="table-cell" href="<?php the_field('mls_link') ?>">Search All <?php the_title() ?> Homes For Sale</a>
	</div>
	<?php $content = get_the_content();
	if ($content) { ?>
		<div class="skinny-cont center section force-center">
			<?php the_content() ?>

			<p><a class="button inline-block" href="<?php the_field('mls_link') ?>">View Homes for Sale </a></p>
		</div>
	<?php } ?>
</div>



<div class="gray section mid-cont table what-are-the-homes-like">
	<?php if (has_post_thumbnail() ) { ?>
		<div class="table-cell half relative background-image" style="background-image:url(<?php the_post_thumbnail_url() ?>)">
			<img class="badge askew" src="<?php echo $badge_img_src ?>">
		</div>
		<div class="table-cell half">
			<h3>What are the homes like?</h3>
			<?php the_field('what_are_the_homes_like') ?>
		</div>

	<?php } else { ?>
		<div class="center skinny-cont">
			<h3>What are the homes like?</h3>
			<?php the_field('what_are_the_homes_like') ?>
		</div>

	<?php } ?>
	</div>


<div class=" mid-cont why_this_neighborhood section">
	<div class="table">
		<?php if (get_field('why_this_neighborhood')) { ?>
			<div class="table-cell half">
				<h3>Why <?php the_title() ?>?</h3>
				<?php the_field('why_this_neighborhood') ?>
			</div>
		<?php } ?>
		<?php if (get_field('might_be_your_neighborhood_if')) { ?>
			<div class="table-cell gray half">
				<h3><?php the_title() ?> might be your neighborhood if:</h3>
				<?php the_field('might_be_your_neighborhood_if') ?>
			</div>
		<?php } ?>
	</div>
</div>

<div class="section mid-cont geography table nobottom" id="details-and-stats">
	<?php if( have_rows('stats') ) {  ?>
		<div class="table-cell half center">
			<h3>Stats Overview</h3>
			<div class="table stats-overview left">
				<?php while( have_rows('stats') ): the_row(); 
				$key = get_sub_field('key');
				$value = get_sub_field('value'); ?>
				<div class="row">
					<div class="table-cell half left">
						<h3><?php echo $key ?></h3>
					</div>
					<div class="table-cell half right">
						<span><?php echo $value ?></span>
					</div>
				</div>
				<?php endwhile; ?>
				
			</div>
			
		</div>
	<?php } ?>
	<div class="table-cell half center">
		<h3>Geography</h3>
		<?php if ($neighb_lat) { ?>
			<div id="map-canvas-neighborhood" data-long="<?php echo $neighb_long ?>" data-lat="<?php echo $neighb_lat ?>"></div>
		<?php } else { ?>
			<div id="map-canvas-neighborhood" data-long="<?php echo $town_long ?>" data-lat="<?php echo $town_lat ?>"></div>
		<?php } ?>
		
		<?php if ($geography) { ?>
			<p class="left"><?php echo $geography ?></p>
		<?php } ?>
		
	</div>
	
</div>


<div class="section center mid-cont ctas above-footer">
	<div class="table">
		<a class="table-cell" href="<?php echo $town_url ?>">
			<h3>Learn About</h3>
			<p><?php echo $town_name ?></p>
		</a>
		<a class="table-cell" href="<?php echo $suggested_link ?>">
			<h3>You Might Also Like</h3>
			<p><?php echo $suggested_name ?></p>
		</a>
		<a class="table-cell" href="/listings/mls-listings/">
			<h3>take me to</h3>
			<p>MLS Search</p>
		</a>


	 </div>
</div>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJmcrw6EmdKVALN1tj50wbIZK7wfDvd28"></script>
<?php get_footer() ?>