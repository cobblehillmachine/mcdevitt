<?php get_header(); the_post(); ?>


<div class="center mid-cont section border">
	<?php the_content(); ?>

<div class="center section table mid-cont">
	<?php $team = new WP_query(array('post_type' => 'Team Members', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC')) ?>
	<?php while ( $team->have_posts() ) : $team->the_post();?>
		<a href="<?php the_permalink() ?>" class="team-member">
			<?php the_post_thumbnail() ?>
			<div class="info">
				<h3><?php the_title() ?></h3>
				<h4><?php the_field('title') ?></h4>
			</div>
		</a>
	<?php endwhile; ?>

</div>

</div>

<?php get_footer() ?>