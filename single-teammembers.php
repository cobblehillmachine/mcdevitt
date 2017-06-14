<?php get_header(); the_post() ?>

<div class="section border mid-cont single-team-member above-footer">
	<div class="table">
		<div class="table-cell"><?php the_post_thumbnail() ?></div>
		<div class="table-cell">
			<h2><?php the_title() ?></h2>
			<h3><?php the_field('title') ?></h3>
			<?php the_content() ?>
		</div>
	</div>
	<div class="absolute">
		<div class="cta">
			<h3>work with me</h3>
			<p><i class="fa fa-phone"></i> <?php the_field('phone_number') ?></p>
			<p><a href="mailto:<?php the_field('email_address') ?>"><i class="fa fa-envelope"></i><?php the_field('email_address') ?></a></p>
			<a href="#" class="button">View My Listings</a>
		</div>
	</div>
</div>

<!--
<div class="section gray mid-cont single-team-member">
	<div class="table">
		<div class="table-cell"><img src="<?php the_field('photo_of_agent_in_local_business') ?>"></div>
		<div class="table-cell">
			<h2><?php the_title() ?></h2>
			<h3><?php the_field('title') ?></h3>
			<?php the_content() ?>
		</div>
	</div>
</div>
-->



<?php get_footer() ?>