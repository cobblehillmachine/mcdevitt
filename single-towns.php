<?php get_header(); the_post();
$town_id = get_the_ID();
$geography = get_field('geography'); ?>

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
	<a class="table-cell smooth-scroll" href="#explore-the-neighborhoods">Explore <?php the_title() ?> Neighborhoods</a>
	<a class="table-cell" href="#">View the <?php the_title() ?> Video</a>
	<a class="table-cell" href="<?php the_field('mls_link') ?>">Search All <?php the_title() ?> Homes For Sale</a>
</div>

<div class="section mid-cont geography table">
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
	<div class="table-cell half center">
		<h3>Geography</h3>
		<div id="map-canvas-neighborhood" data-long="<?php the_field('longitude') ?>" data-lat="<?php the_field('latitude') ?>"></div>
		<?php if ($geography) { ?>
			<p class="left"><?php echo $geography ?></p>
		<?php } ?>
		
	</div>
	
</div>

<div class="section gray center mid-cont above-footer" id="explore-the-neighborhoods">
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJmcrw6EmdKVALN1tj50wbIZK7wfDvd28"></script>
<?php get_footer() ?>